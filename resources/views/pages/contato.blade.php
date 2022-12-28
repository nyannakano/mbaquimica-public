@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')

<div class="card text-center" style="width: 50rem; margin: auto;">
    <div class="card-body">
      <h4 class="card-title"><b>Precisa de ajuda? Entre em contato conosco!</b></h4>
      <p class="card-text">Número: {{ $empresa->com_number }}</p>
      <p class="card-text">E-mail: {{ $empresa->com_mail }}</p>
    </div>
</div>

<div class="card text-center mt-2 mb-2" style="width: 50rem; margin: auto;">
    <div class="card-body">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1816.1959667443314!2d-50.763995746610426!3d-24.437183779151507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1635793849407!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<div class="card text-center" style="width: 50rem; margin: auto;">
    <div class="card-body">
      <h4 class="card-title"><b>Deixe sua mensagem:</b></h4>
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email:</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Número de telefone:</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="(99) 99999-9999">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Mensagem:</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class="btn btn-success btn-round">Enviar</button>
      </form>
    </div>
</div>

@endsection
