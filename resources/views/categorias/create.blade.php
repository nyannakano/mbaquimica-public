@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')



<div class="card text-center" style="width: 50rem; margin: auto;">
    <div class="card-body">
      <h4 class="card-title"><b>Cadastrando Categoria:</b></h4>
    <form method="post">
        @csrf
        <label for="cat_name" class="textoLaranja">Nome:</label>
        <div class="input-group mb-2">
              <input type="text" class="form-control" name="cat_name" placeholder="Nome da categoria">
        </div>
        <label for="cat_order" class="textoLaranja">Ordem (coloque um número inteiro, o catálogo é ordenado de forma crescente):</label>
        <div class="input-group mb-2">
            <input type="number" class="form-control" name="cat_order" placeholder="Informe um número">
        </div>
        <button class="btn btn-primary mb-2 mt-5">Cadastrar</button>
    </form>
    </div>
</div>

@endsection
