@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')



<div class="card text-center" style="width: 50rem; margin: auto;">
    <div class="card-body">
      <h4 class="card-title"><b>Cadastrando Produto:</b></h4>
      <div class="produtoCriacao">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="pro_name" class="textoLaranja">Nome:</label>
            <div class="input-group mb-2">
                <input type="text" required class="form-control" name="pro_name" placeholder="Nome do produto">
            </div>

            <div class="alert alert-info" role="alert">
                Para quebrar linhas, coloque esta tag no final da linha que deseja: <strong><b>[br]</b></strong><br><br>
                Para deixar alguma palavra em negrito, coloque estas tags entre o começo e o final da palavra:  <strong><b>[b] [/b]</b></strong><br><br>

                Exemplo:
                <strong><b>[b] </strong></b>Produto de Limpeza <strong><b>[/b] </strong></b><br>
                Resultado:
                <strong><b>Produto de Limpeza</b></strong>
            </div>

            <label for="pro_description" class="textoLaranja">Descrição:</label>
            <div class="input-group mb-2">
                <textarea name="pro_description" required class="form-control" rows="15"></textarea>
            </div>
            <label for="categoria" class="textoLaranja">Categoria:</label>
            <div class="input-group mb-2">
                <select required class="custom-select" name="categoria" id="categoria">
                    <option selected>Escolha...</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->cat_name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <label for="pro_image" class="textoLaranja">Imagem:</label>
            <div class="input-group mb-2">
                <label style="width: 100%;">
                    <input type="file" class="form-control" id="pro_image" name="pro_image">
                </label>
            </div>
            <button class="btn btn-success mb-2 mt-3">Cadastrar</button>
        </form>
    </div>
    </div>
</div>

@endsection
