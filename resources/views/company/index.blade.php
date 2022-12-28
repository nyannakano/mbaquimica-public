@extends('templates.layout-admin')

@section('header')

@endsection

@section('content')



<div class="card text-center" style="width: 50rem; margin: auto;">
    <div class="card-body">
      <h4 class="card-title"><b>Cadastrando dados da empresa:</b></h4>
      <div class="companyCriacao">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="com_number" class="textoLaranja">Número de telefone para contato:</label>
            <div class="input-group mb-2">
                <input type="text" required class="form-control" name="com_number" value="{{ $empresa->com_number }}" placeholder="Exemplo: (99)99999-9999" required>
            </div>
            <label for="com_mail" class="textoLaranja">E-mail:</label>
            <div class="input-group mb-2">
                <input required type="text" class="form-control" value="{{ $empresa->com_mail }}" name="com_mail" placeholder="Exemplo: mbaquimica@mbaquimica.com.br">
            </div>
            <label for="com_history" class="textoLaranja">História:</label>
            <div class="input-group mb-2">
                <textarea class="form-control" name="com_history" required>{{ $empresa->com_history }}</textarea>
            </div>
            <label for="com_values" class="textoLaranja">Valores:</label>
            <div class="input-group mb-2">
                <textarea class="form-control" name="com_values" required>{{ $empresa->com_values }}</textarea>
            </div>
            <button class="btn btn-success mb-2 mt-3">Cadastrar</button>
        </form>
    </div>
    </div>
</div>

@endsection
