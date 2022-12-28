@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')

@foreach ($posts as $post)

    <div class="card mb-3">
        <img class="card-img-top" src="{{ asset('assets/storage/' .$post->blog_image) }}" alt="Card image cap">
        <div class="card-body">
            @php
                $postunformated = $post->blog_content;
                $arrayvaluesformat = array('[br]', '[/b]', '[b]');
                $arrayvalues = array(' ', ' ', ' ');
                $postcontent = str_replace($arrayvaluesformat, $arrayvalues, $postunformated);
            @endphp
            <h6 class="card-title">{{ $post->blog_title }}</h6>
            <p class="card-text">{{ \Illuminate\Support\Str::limit($postcontent, 600) }}</p>
            <p class="card-text"><a href="{{ route('blog.post', ["id" => $post->id]) }}"><small class="text-muted">Ler Mais</small></a></p>
        </div>
    </div>

@endforeach
@endsection
