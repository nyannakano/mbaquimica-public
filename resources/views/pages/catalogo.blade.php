@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')

<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><b>Categorias</b></li>
      @foreach ($categorias as $categoria)
        <li class="breadcrumb-item"><a href="{{ route('pages.categoria', ["id" => $categoria->id ]) }}"> {{$categoria->cat_name}} </a></li>
      @endforeach
    </ol>
  </nav>


    <div class="row ml-1">
@foreach($produtos as $produto)
@php
    $produtodescriptionformat = $produto->pro_description;
    $arrayvaluesformat = array('[', ']');
    $arrayvalues = array('<', '>');
    $produtodescription = str_replace($arrayvaluesformat, $arrayvalues, $produtodescriptionformat);
@endphp
        <div class="card mr-2" style="width: 20rem;">
        <a href="{{ route('pages.produto', ['id' => $produto->id]) }}" data-placement="right" data-toggle="tooltip" data-html="true" title="{!! $produtodescription !!}">
            <img class="card-img-top" src="{{ asset('assets/storage/' .$produto->pro_image) }}" alt="Card image cap">

            <div class="card-body">
                <p class="card-text"><b>{{ $produto->pro_name }}</b></p>
            </div>
        </a>
        </div>
@endforeach

</div>

{{ $produtos->links() }}
{{-- teste --}}
@endsection
