@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @php
            $count = 0;
        @endphp
        @foreach($carousels as $carousel)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $count }}"></li>
            @php
                $count++;
            @endphp
        @endforeach
    </ol>
    <div class="carousel-inner">
        @php
            $count = 0;
        @endphp
        @foreach($carousels as $carousel)
        @if($count == 0){
      <div class="carousel-item active">
          @if($carousel->car_image == null)
            <a href="{{ $carousel->car_link }}"><img class="d-block w-100" src="{{ asset('assets/img/carrossel/placeholder.png') }}" alt="{{ $count }} slide"></a>
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $carousel->car_title }}</h5>
              </div>
          @else
          <a href="{{ $carousel->car_link }}"><img class="d-block w-100" src="{{ asset('assets/storage/' .$carousel->car_image) }}" alt="{{ $count }} slide"></a>
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $carousel->car_title }}</h5>
            </div>
          @endif
      </div>
            @php
                $count++;
            @endphp

        @else
        <div class="carousel-item">
            @if($carousel->car_image == null)
              <a href="{{ $carousel->car_link }}"><img class="d-block w-100" src="{{ asset('assets/img/carrossel/placeholder.png') }}" alt="{{ $count }} slide"></a>
              <div class="carousel-caption d-none d-md-block">
                  <h5>{{ $carousel->car_title }}</h5>
                </div>
            @else
            <a href="{{ $carousel->car_link }}"><img class="d-block w-100" src="{{ asset('assets/storage/' .$carousel->car_image) }}" alt="{{ $count }} slide"></a>
              <div class="carousel-caption d-none d-md-block">
                  <h5>{{ $carousel->car_title }}</h5>
              </div>
            @endif
        </div>
              @php
                  $count++;
              @endphp
        @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>


  <div class="card card-nav-tabs text-center mt-5 mb-5">
    <div class="card-header card-header-primary">

    </div>
    <div class="card-body">
      <h4 class="card-title">Deseja trabalhar conosco?</h4>
      <p class="card-text">Seja um revendedor autorizado! Clique no botão abaixo para mais informações</p>
      <a href="{{ route('pages.contato') }}" class="btn btn-success">Mais informações</a>
    </div>
    <div class="card-body">
        <h4 class="card-title mb-3">Saiba mais sobre nossa história!</h4>
        <a href="{{ route('pages.historia') }}" class="btn btn-success">Clique Aqui</a>
      </div>
      <div class="card-body">
        <h4 class="card-title mb-3">Saiba mais sobre nossa visão, missão e valores</h4>
        <a href="{{ route('pages.valores') }}" class="btn btn-success">Clique Aqui</a>
      </div>
  </div>

    <div class="row">

@foreach($produtos as $produto)
@php
    $produtodescriptionformat = $produto->pro_description;
    $arrayvaluesformat = array('[', ']');
    $arrayvalues = array('<', '>');
    $produtodescription = str_replace($arrayvaluesformat, $arrayvalues, $produtodescriptionformat);
@endphp
        <div class="card mr-3 ml-3" style="width: 20rem;">
            <a href="{{ route('pages.produto', ['id' => $produto->id]) }}" data-placement="right" data-toggle="tooltip" data-html="true" title="{!! $produtodescription !!}">
            <img class="card-img-top" src="{{ asset('assets/storage/' .$produto->pro_image) }}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text"><b>{{ $produto->pro_name }}</b></p>
            </div>
            </a>
        </div>
@endforeach
</div>

<a href="{{ route('pages.catalogo') }}" class="btn btn-success btn-round mb-3">Ver Mais</a>
@endsection
