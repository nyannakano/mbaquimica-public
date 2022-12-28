<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $empresa = Company::find(1);

        return view('company.index', compact('mensagem', 'empresa'));
    }

    public function update(Request $request){
        $empresa = Company::find(1);

        $empresa->com_number = $request->com_number;
        $empresa->com_mail = $request->com_mail;
        $empresa->com_history = $request->com_history;
        $empresa->com_values = $request->com_values;
        $empresa->save();

        return redirect()->route('company.index');
    }

}
