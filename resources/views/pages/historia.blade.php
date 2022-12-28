@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')

<div class="card text-center mb-3" style=" margin: auto;">
    <div class="card-body">
        <div class="form-group">
        <img class="card-img-top" src="{{ asset('assets/img/logo/mbaquimicalogo.png') }}" style="width: 50%;" alt="Card image cap">
        </div>
      <h4 class="card-title"><b>Nossa História:</b></h4>
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label><br>
          <b>{{ $empresa->com_history }}</b>
        </div>
      </form>
    </div>
</div>

@endsection
