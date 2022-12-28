@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')



<strong><b>Resultados para sua busca</b></strong><br>
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
