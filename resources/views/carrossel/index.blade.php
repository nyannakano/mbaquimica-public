@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')



<a href="{{ route('carrossel.create') }}" class="btn btn-success mb-2 mt-2">
    Inserir Nova Imagem</a>

<table class="table table-hover table-responsive-xl table-light">
    <thead class="thead-dark">
    <tr>
        <th scope="col" style="width: 12%;">Id</th>
        <th scope="col" style="width: 23%;">Título</th>
        <th scope="col" style="width: 25%;">Link</th>
        <th scope="col" style="width: 25%;">Ativo</th>
        <th scope="col" style="width: 10%;">Edição</th>
        <th scope="col" style="width: 10%;">Exclusão</th>
        <th scope="col" style="width: 10%;">Ativar/Desativar</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($carousels as $carousel)
            <tr>
                <th><h6>{{ $carousel->id }}</h6></th>
                <td><h6>{{ $carousel->car_title }}</h6></td>
                <td><h6>{{ $carousel->car_link }}</h6></td>
                <td><h6>
                    @if($carousel->car_status == 1)
                        Sim
                    @else
                        Não
                    @endif
                </h6></td>
                <td>
                    {{-- Edição de cadastro através de modal do bootstrap --}}
                    <button name="editar" id="editar" class="btn btn-info btn-secondary" data-toggle="modal"
                            data-target="#carousel{{ $carousel->id }}">
                        <i class="fas fa-xs fa-edit"></i>
                    </button>
                    {{-- divs para modal de edição --}}
                    <div class="modal fade" id="carousel{{ $carousel->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="carouselLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="carouselLabel">Editando
                                        Item Carrossel {{ $carousel->car_title }}</h5>
                                </div>
                                <form action="/carrossel/editar/{{ $carousel->id }}" enctype="multipart/form-data"
                                      method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="title" id="car_title">Título:</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="car_title" id="car_title"
                                                   placeholder="Título do Item do Carrossel" value="{{ $carousel->car_title }}">
                                        </div>
                                        <label for="car_link" id="car_link">Link:</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="car_link" id="car_link"
                                                   placeholder="Link do Carrossel" value="{{ $carousel->car_link }}">
                                        </div>
                                        <label for="car_status" id="car_status">Disponível?</label>
                                        <div class="input-group mb-2">
                                            <select required class="custom-select" name="car_status" id="car_status">
                                                @if($carousel->car_status == 1)
                                                <option value="1" selected>
                                                    Sim
                                                </option>
                                                <option value="2">
                                                    Não
                                                </option>
                                                @else
                                                <option value="1">
                                                    Sim
                                                </option>
                                                <option value="2" selected>
                                                    Não
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                        <label for="car_image">Imagem:</label>
                                    <div class="input-group mb-2">
                                        @if ($carousel->car_image == null)
                                            Sem imagem
                                        @else
                                            <img class="card-img-top" src="{{ asset('assets/storage/' .$carousel->car_image) }}" alt="Card image cap">
                                        @endif
                                        <div class="form">
                                            <input type="checkbox" id="check" name="check" value="checked">
                                            <label class="check" for="check">Remover Imagem</label>
                                        </div>
                                        <label style="width: 100%;">
                                            <input type="file" class="form-control" id="car_image" name="car_image">
                                        </label>
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
                        <form action="/carrossel/remover/{{ $carousel->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button name="remover" id="remover" class="btn btn-danger btn-secondary"
                                    onclick="return confirm('Deseja realmente excluir esta carousel?')">
                                <i class="fas fa-xs fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="/carrossel/status/{{ $carousel->id }}" method="post">
                            @csrf
                            @if($carousel->car_status === 0)
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

@endsection
