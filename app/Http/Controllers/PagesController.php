<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Carousel;
use App\Models\Categoria;
use App\Models\Company;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{

//
//  PAGINAS DOS CLIENTES
//

    public function index(){
        $produtos = Produto::all()->where('pro_del', '=', 0)->take(6);
        $carousels = Carousel::all()->where('car_status', '=', 1);

        return view('welcome', compact('produtos', 'carousels'));
    }


    public function contato()
    {
        $empresa = Company::all()->first();
        return view('pages.contato', compact('empresa'));
    }

    public function historia()
    {
        $empresa = Company::all()->first();
        return view('pages.historia', compact('empresa'));
    }

    public function valores()
    {
        $empresa = Company::all()->first();
        return view('pages.valores', compact('empresa'));
    }


//
//  FUNCTIONS PARA O CARROSSEL
//

    public function carrossel() {
        $carousels = Carousel::all();

        return view('carrossel.index', compact('carousels'));
    }

    public function createCarousel(){

        return view('carrossel.create');
    }

    public function storeCarousel(Request $request) {
        $carousel = Carousel::create([
            'car_title' => $request->car_title,
            'car_image' => $this->verificaImagem($request),
            'car_status' => $request->car_status,
            'car_link' => $request->car_link,
        ]);

        $request->session()->flash('mensagem', "Item do carrossel {$carousel->car_title} cadastrado com sucesso!");

        return redirect()->route('carrossel.index');
    }

    public function destroyCarousel(Request $request) {
        $carousel = Carousel::find($request->id);
        Storage::disk('local')->delete('public/'.$carousel->car_image);
        $carousel->delete();
        $request->session()->flash('mensagem', "Item do carrossel removido com sucesso!");
        return redirect()->route('carrossel.index');
    }


    public function updateCarousel(Request $request) {
        $carousel = Carousel::find($request->id);
        $carousel->car_title = $request->car_title;
        $carousel->car_link = $request->car_link;
        $carousel->car_status = $request->car_status;


        if ($request->input('check') == 'checked') {
            Storage::disk('local')->delete('public/'.$carousel->car_image);
            $carousel->car_image = null;
            $carousel->save();
            $request->session()->flash('mensagem', "Item do carrossel $carousel->car_title editado com sucesso!");
            return redirect()->route('carrossel.index');
        } else {
            if (!$request->hasFile("car_image")) {
                $carousel->save();
                $request->session()->flash('mensagem', "Item do carrossel $carousel->car_title editado com sucesso!");
                return redirect()->route('carrossel.index');
            }
        }

        Storage::disk('local')->delete('public/'.$carousel->car_image);

        $carousel->car_image = $this->verificaImagem($request);
        $carousel->save();
        $request->session()->flash('mensagem', "Item do carrossel $carousel->pro_name editado com sucesso!");

        return redirect()->route('carrossel.index');
    }

    public function statusCarousel($id) {
        $carousel = Carousel::find($id);
        if ($carousel->car_status == 1) {
            $carousel->car_status = 2;
            $carousel->save();
        } else {
            $carousel->car_status = 1;
            $carousel->save();
        }

        return redirect()->route('carrossel.index');
    }

//
//  FUNCTIONS PARA O CATALAGO
//


    public function catalogoIndex() {
        $produtos = Produto::all()->where('pro_del', '=', 0)->paginate(12);
        $categorias = Categoria::all();
        return view('pages.catalogo', compact('produtos', 'categorias'));
    }

    public function catalogoFilterCategoria($id){
        $categoria = Categoria::find($id);
        $produtos = Produto::all()->where('cat_id', '=', $categoria->id)->paginate(20);
        return view('pages.catalogofilter', compact('categoria', 'produtos'));
    }

    public function catalogoFilterProduto(Request $request){
        $produto = Produto::find($request->id);
        $produtodescriptionformat = $produto->pro_description;
        $arrayvaluesformat = array('[', ']');
        $arrayvalues = array('<', '>');
        $produtodescription = str_replace($arrayvaluesformat, $arrayvalues, $produtodescriptionformat);
        return view('pages.produto', compact('produto', 'produtodescription'));
    }

    public function blog(){
        $posts = Blogpost::orderBy('id', 'DESC')->get()->paginate(10);
        return view('blog.clientes', compact('posts'));
    }

    public function blogpost($id){
        $post = Blogpost::find($id);
        return view('blog.post', compact('post'));
    }


    //
    // funcionamento de upload das imagens para o carrossel
    //
    public function verificaImagem(Request $request)
    {
        if ($request->car_image == null){
            return ;
        }
        if (
            $request->car_image->isValid() &&
            $request->car_image->extension() == 'jpg' ||
            $request->car_image->extension() == 'jpeg' ||
            $request->car_image->extension() == 'png'
        ) {
            $path = Storage::putFile("public/carousel", $request->file("car_image"));
            $path = ltrim($path, 'public');
            $data['car_image'] = $path;

            return $path;
        }
        return null;
    }


    ///
    /// Search
    ///
    public function search(Request $request){
        // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $produtos = Produto::query()
        ->where('pro_name', 'LIKE', "%{$search}%")
        ->orWhere('pro_description', 'LIKE', "%{$search}%")
        ->get()->paginate(12);

    return view('pages.search', compact('produtos'));
    }
}
