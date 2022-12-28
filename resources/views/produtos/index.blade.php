@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')

<a href="{{ route('produtos.create') }}" class="btn btn-success mb-2 mt-2">
    Cadastrar Produto</a>

<table class="table table-hover table-responsive-xl table-light">
    <thead class="thead-dark">
    <tr>
        <th scope="col" style="width: 12%;">Id</th>
        <th scope="col" style="width: 23%;">Nome</th>
        <th scope="col" style="width: 23%;">Descrição</th>
        {{-- <th scope="col" style="width: 20%;">Preço</th> --}}
        <th scope="col" style="width: 25%;">Categoria</th>
        <th scope="col" style="width: 10%;">Edição</th>
        <th scope="col" style="width: 10%;">Exclusão</th>
        <th scope="col" style="width: 10%;">Ativar/Desativar</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($produtos as $produto)
        <tr>
            <th><h6>{{ $produto->id }}</h6></th>
            <td><h6>{{ $produto->pro_name }}</h6></td>
            <td><h6>{{ $produto->pro_description }}</h6></td>
            {{-- <td>{{ $produto->pro_price }}</td> --}}
            @foreach ($categorias as $categoria) {{-- for each para buscar todos as categorias --}}
            @if($categoria->id == $produto->cat_id) {{-- if para deixar selecionado a categoria atual --}}
            <td><h6>{{ $categoria->cat_name }}</h6></td>
            @endif
            @endforeach

            <td>
                {{-- Edição de cadastro através de modal do bootstrap --}}
                <button name="editar" id="editar" class="btn btn-info btn-secondary" data-toggle="modal"
                        data-target="#produto{{ $produto->id }}">
                    <i class="fas fa-xs fa-edit"></i>
                </button>
                {{-- divs para modal de edição --}}
                <div class="modal fade" id="produto{{ $produto->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="produtoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="produtoLabel">Editando
                                    produto {{ $produto->pro_name }}</h5>
                            </div>
                            <form action="/produtos/editar/{{ $produto->id }}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                <div class="modal-body">
                                    <label for="name" id="name">Nome:</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Nome do produto" value="{{ $produto->pro_name }}">
                                    </div>
                                    {{-- <label for="pro_price">Preço:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                            <input type="number" min="0" value="{{ $produto->pro_price }}"
                                                   step="0.01" class="form-control" name="pro_price">
                                        </div>
                                    </div> --}}
                                    <div class="alert alert-info" role="alert">
                                        Para quebrar linhas, coloque esta tag no final da linha que deseja: <strong><b>[br]</b></strong><br><br>
                                        Para deixar alguma palavra em negrito, coloque estas tags entre o começo e o final da palavra:  <strong><b>[b] [/b]</b></strong><br><br>

                                        Exemplo:
                                        <strong><b>[b] </strong></b>Produto de Limpeza <strong><b>[/b] </strong></b><br>
                                        Resultado:
                                        <strong><b>Produto de Limpeza</b></strong>
                                    </div>
                                    <label for="pro_description">Descrição:</label>
                                    <div class="input-group mb-2">
                                        <textarea name="pro_description" class="form-control" rows="15">
                                        {{ $produto->pro_description }}
                                        </textarea>
                                    </div>
                                    <label for="categoria">Categoria:</label>
                                    <div class="input-group mb-2">
                                        <select class="custom-select" name="categoria" id="categoria">
                                            @foreach ($categorias as $categoria) {{-- for each para buscar todos as categorias --}}
                                            @if($categoria->id == $produto->cat_id) {{-- if para deixar selecionado a categoria atual --}}
                                            <option value="{{ $categoria->id }}" selected>
                                                {{ $categoria->cat_name }}
                                            </option>
                                            @else
                                                <option value="{{ $categoria->id }}">
                                                    {{ $categoria->cat_name }}
                                                </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="pro_image">Imagem:</label>
                                    <div class="input-group mb-2">
                                        @if ($produto->pro_image == null)
                                            <img src="{{asset('storage/proimages/imagemnull.png')}}" class="prodimg"
                                                 alt="">
                                        @else
                                            <img class="card-img-top" src="{{ asset('assets/storage/' .$produto->pro_image) }}" alt="Card image cap">
                                        @endif
                                    </div>
                                    <div class="form">
                                        <input type="checkbox" id="check" name="check" value="checked">
                                        <label class="check" for="check">Remover Imagem</label>
                                    </div>
                                    <label style="width: 100%;">
                                        <input type="file" class="form-control" id="pro_image" name="pro_image">
                                    </label>
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
                    <form action="/produtos/remover/{{ $produto->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button name="remover" id="remover" class="btn btn-danger btn-secondary"
                                onclick="return confirm('Deseja realmente excluir este produto?')">
                            <i class="fas fa-xs fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </td>
            <td>
                <div class="btn-group" role="group">
                    <form action="/produtos/status/{{ $produto->id }}" method="post">
                        @csrf
                        @if($produto->pro_del === 0)
                            <button name="status" id="status" class="btn btn-dark btn-secondary"
                                    onclick="return confirm('Deseja realmente desativar este produto?')">
                                <i class="fas fa-power-off"></i>
                            </button>
                        @else
                            <button name="status" id="status" class="btn btn-dark btn-secondary"
                                    onclick="return confirm('Deseja realmente ativar este produto?')">
                                <i class="fas fa-power-off"></i>
                            </button>
                        @endif
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $produtos->links() }}
@endsection
