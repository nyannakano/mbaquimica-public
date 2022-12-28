@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')


<div class="card text-center mt-2 mb-2" style="width: 50rem; margin: auto;">
    <div class="card-body">
        <p class="ml-3 h6">O campo "Ordem" é referente a ordem em que as categorias serão mostradas no catálogo do site.</p>
        <p class="ml-3 h6">Informe um número inteiro, quanto menor o número for, o sistema dará mais prioridade para aparecer no site.</p>
    </div>
</div>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-2 mt-2">
        Cadastrar Categoria</a>
<table class="table table-hover table-responsive-xl table-light">
    <thead class="thead-dark">
    <tr>
        <th scope="col" style="width: 12%;">Id</th>
        <th scope="col" style="width: 23%;">Nome</th>
        <th scope="col" style="width: 23%;">Ordem</th>
        <th scope="col" style="width: 20%;">Edição</th>
        <th scope="col" style="width: 25%;">Exclusão</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($categorias as $categoria)
        <tr>
            <th><h6>{{ $categoria->id }}</h6></th>
            <td><h6>{{ $categoria->cat_name }}</h6></td>
            <td><h6>{{ $categoria->cat_order }}</h6></td>
            <td>
                {{-- Edição de cadastro através de modal do bootstrap --}}
                <button name="editar" id="editar" class="btn btn-info btn-secondary" data-toggle="modal"
                        data-target="#categoria{{ $categoria->id }}">
                    <i class="fas fa-xs fa-edit"></i>
                </button>
                {{-- divs para modal de edição --}}
                <div class="modal fade" id="categoria{{ $categoria->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="categoriaLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoriaLabel">Editando
                                    Categoria {{ $categoria->cat_name }}</h5>
                            </div>
                            <form action="/categorias/editar/{{ $categoria->id }}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                <div class="modal-body">
                                    <label for="name" id="name">Nome:</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Nome da Categoria" value="{{ $categoria->cat_name }}">
                                    </div>
                                    <label for="cat_order" id="cat_order">Ordem da categoria:</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="cat_order" id="cat_order"
                                               placeholder="Ordem da categoria" value="{{ $categoria->cat_order }}">
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
                    <form action="/categorias/remover/{{ $categoria->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button name="remover" id="remover" class="btn btn-danger btn-secondary"
                                onclick="return confirm('Deseja realmente excluir esta categoria?')">
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
