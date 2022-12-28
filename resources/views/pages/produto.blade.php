@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')


<div class="card text-center mb-3" style=" margin: auto;">
    <div class="card-body">
        <div class="form-group">
        <img class="card-img-top" src="{{ asset('assets/storage/' .$produto->pro_image) }}" alt="Card image cap">
        </div>
      <h4 class="card-title"><b>{{ $produto->pro_name }}</b></h4>
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Descrição:</label><br>
          <strong>{!! $produtodescription !!}</strong>
        </div>
      </form>
    </div>
</div>

@endsection
