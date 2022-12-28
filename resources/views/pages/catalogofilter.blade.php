@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')

<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><b>Categoria</b></li>

        <li class="breadcrumb-item"><a href="{{ route('pages.categoria', ["id" => $categoria->id ]) }}"> {{$categoria->cat_name}} </a></li>

    </ol>
  </nav>


    <div class="row">

@foreach($produtos as $produto)
<div class="card" style="width: 20rem;">
        <a href="{{ route('pages.produto', ['id' => $produto->id]) }}"><img class="card-img-top" src="{{ asset('assets/storage/' .$produto->pro_image) }}" alt="Card image cap">
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
