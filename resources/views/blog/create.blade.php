@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')



<div class="card text-center" style="width: 50rem; margin: auto;">
    <div class="card-body">
      <h4 class="card-title"><b>Fazendo novo post:</b></h4>
      <div class="produtoCriacao">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="blog_title" class="textoLaranja">Título:</label>
            <div class="input-group mb-2">
                <input type="text" required class="form-control" name="blog_title" placeholder="Título da postagem" required>
            </div>
            <div class="alert alert-info" role="alert">
                Para quebrar linhas, coloque esta tag no final da linha que deseja: <strong><b>[br]</b></strong><br><br>
                Para deixar alguma palavra em negrito, coloque estas tags entre o começo e o final da palavra:  <strong><b>[b] [/b]</b></strong><br><br>

                Exemplo:
                <strong><b>[b] </strong></b>Produto de Limpeza <strong><b>[/b] </strong></b><br>
                Resultado:
                <strong><b>Produto de Limpeza</b></strong>
            </div>
            <label for="blog_content" class="textoLaranja">Texto:</label>
            <div class="input-group mb-2">
                <textarea class="form-control" name="blog_content" required></textarea>
            </div>
            <label for="blog_image" class="textoLaranja">Imagem:</label>
            <div class="input-group mb-2">
                <label style="width: 100%;">
                    <input type="file" class="form-control" id="blog_image" name="blog_image">
                </label>
            </div>
            <button class="btn btn-success mb-2 mt-3">Cadastrar</button>
        </form>
    </div>
    </div>
</div>

@endsection
