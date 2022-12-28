<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogpostsController extends Controller
{
    public function index(Request $request)
    {
        $blogposts = Blogpost::all();
        $mensagem = $request->session()->get('mensagem');

        return view('blog.index', compact('blogposts', 'mensagem'));
    }

    public function createPost()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {

        $post = Blogpost::create([
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content,
            'blog_image' => $this->verificaImagem($request),
        ]);
        $request->session()->flash('mensagem', "Post {$post->blog_title} realizado com sucesso!");

        return redirect()->route('blog.index');
    }

    public function destroy(Request $request)
    {
        $blog = Blogpost::destroy($request->id);
        return redirect()->route('blog.index');
    }

    public function update(Request $request) {
        $blog = Blogpost::find($request->id);
        $blog->blog_title = $request->blog_title;
        $blog->blog_content = $request->blog_content;


        if ($request->input('check') == 'checked') {
            Storage::disk('local')->delete('public/'.$blog->blog_image);
            $blog->car_image = null;
            $blog->save();
            $request->session()->flash('mensagem', "Post $blog->blog_title editado com sucesso!");
            return redirect()->route('blog.index');
        } else {
            if (!$request->hasFile("blog_image")) {
                $blog->save();
                $request->session()->flash('mensagem', "Post $blog->blog_title editado com sucesso!");
                return redirect()->route('blog.index');
            }
        }

        Storage::disk('local')->delete('public/'.$blog->blog_image);

        $blog->blog_image = $this->verificaImagem($request);
        $blog->save();
        $request->session()->flash('mensagem', "Post $blog->blog_title editado com sucesso!");

        return redirect()->route('blog.index');
    }

    public function verificaImagem(Request $request)
    {
        if ($request->blog_image == null){
            return ;
        }
        if (
            $request->blog_image->isValid() &&
            $request->blog_image->extension() == 'jpg' ||
            $request->blog_image->extension() == 'jpeg' ||
            $request->blog_image->extension() == 'png'
        ) {
            $path = Storage::putFile("public/blogimages", $request->file("blog_image"));
            $path = ltrim($path, 'public');
            $data['blog_image'] = $path;

            return $path;
        }
        return null;
    }
}
