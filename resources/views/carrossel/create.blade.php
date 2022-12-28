@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')



<div class="card text-center" style="width: 50rem; margin: auto;">
    <div class="card-body">
      <h4 class="card-title"><b>Cadastrando novo item para o carrossel:</b></h4>
      <div class="produtoCriacao">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="car_title" class="textoLaranja">Título:</label>
            <div class="input-group mb-2">
                <input type="text" required class="form-control" name="car_title" placeholder="Título do item" required>
            </div>
            <label for="car_link" class="textoLaranja">Link para onde será redirecionado:</label>
            <div class="input-group mb-2">
                <input required type="text" class="form-control" name="car_link" placeholder="Link para redirecionamento">
            </div>
            <label for="car_image" class="textoLaranja">Imagem:</label>
            <div class="input-group mb-2">
                <label style="width: 100%;">
                    <input type="file" class="form-control" id="car_image" name="car_image">
                </label>
            </div>
            <label for="car_link" class="textoLaranja">Deixar item disponível?</label>
            <select required class="custom-select" name="car_status" id="car_status">
                <option value="1">
                    Sim
                </option>
                <option value="2">
                    Não
                </option>
            </select>
            <button class="btn btn-success mb-2 mt-3">Cadastrar</button>
        </form>
    </div>
    </div>
</div>

@endsection
