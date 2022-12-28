@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')

<a href="{{ route('blog.create') }}" class="btn btn-success mb-2 mt-2">
    Fazer nova postagem</a>

<table class="table table-hover table-responsive-xl table-light">
    <thead class="thead-dark">
    <tr>
        <th scope="col" style="width: 12%;">Id</th>
        <th scope="col" style="width: 23%;">Título</th>
        <th scope="col" style="width: 25%;">Link</th>
        <th scope="col" style="width: 10%;">Edição</th>
        <th scope="col" style="width: 10%;">Exclusão</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($blogposts as $blogpost)
            <tr>
                <th><h6>{{ $blogpost->id }}</h6></th>
                <td><h6>{{ $blogpost->blog_title }}</h6></td>
                <td><h6>{{ $blogpost->blog_link }}</h6></td>
                <td>
                    {{-- Edição de cadastro através de modal do bootstrap --}}
                    <button name="editar" id="editar" class="btn btn-info btn-secondary" data-toggle="modal"
                            data-target="#blogpost{{ $blogpost->id }}">
                        <i class="fas fa-xs fa-edit"></i>
                    </button>
                    {{-- divs para modal de edição --}}
                    <div class="modal fade" id="blogpost{{ $blogpost->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="blogpostLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="blogpostLabel">Editando
                                        Postagem: {{ $blogpost->blog_title }}</h5>
                                </div>
                                <form action="/blogposts/editar/{{ $blogpost->id }}" enctype="multipart/form-data"
                                      method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="title" id="title">Título:</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="blog_title" id="blog_title"
                                                   placeholder="Título do Item do Carrossel" value="{{ $blogpost->blog_title }}">
                                        </div>
                                        <label for="blog_link" id="blog_link">Link:</label>
                                        <div class="input-group mb-2">
                                            <input type="text" disabled class="form-control" name="blog_link" id="blog_link"
                                                   placeholder="Link do Post" value="{{ route('blog.post', ["id" => $blogpost->id ]) }}">
                                        </div>
                                        <label for="blog_image" id="blog_image">Imagem:</label>
                                        <div class="input-group mb-2">
                                            @if ($blogpost->blog_image == null)
                                                <img src="{{asset('storage/blogimages/imagemnull.png')}}" class="prodimg"
                                                     alt="">
                                            @else
                                                <img class="card-img-top" src="{{ asset('assets/storage/' .$blogpost->blog_image) }}" alt="Card image cap">
                                            @endif
                                        </div>
                                        <div class="form">
                                            <input type="checkbox" id="check" name="check" value="checked">
                                            <label class="check" for="check">Remover Imagem</label>
                                        </div>
                                        <label style="width: 100%;">
                                            <input type="file" class="form-control" id="blog_image" name="blog_image">
                                        </label>
                                        <div class="alert alert-info" role="alert">
                                            Para quebrar linhas, coloque esta tag no final da linha que deseja: <strong><b>[br]</b></strong><br><br>
                                            Para deixar alguma palavra em negrito, coloque estas tags entre o começo e o final da palavra:  <strong><b>[b] [/b]</b></strong><br><br>

                                            Exemplo:
                                            <strong><b>[b] </strong></b>Produto de Limpeza <strong><b>[/b] </strong></b><br>
                                            Resultado:
                                            <strong><b>Produto de Limpeza</b></strong>
                                        </div>
                                        <label for="blog_content" id="blog_content">Texto do post:</label>
                                        <div class="input-group mb-2">
                                            <textarea class="form-control" name="blog_content" id="blog_content"
                                                   placeholder="Conteúdo do post">{{ $blogpost->blog_content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary mr-3 mt-3 mb-3" data-dismiss="modal">Fechar
                                        </button>
                                        <button type="submit" class="btn btn-primary mr-3 mt-3 mb-3">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- fim das divs modal --}}
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="/blogposts/remover/{{ $blogpost->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button name="remover" id="remover" class="btn btn-danger btn-secondary"
                                    onclick="return confirm('Deseja realmente excluir esta blogpost?')">
                                <i class="fas fa-xs fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
</table>

@endsection
