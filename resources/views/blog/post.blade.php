@extends('templates.layout-principal')

@section('header')

@endsection

@section('content')

    <div class="card mb-3">
        <img class="card-img-top" src="{{ asset('assets/storage/' .$post->blog_image) }}" alt="Card image cap">
        <div class="card-body">
            <h6 class="card-title">{{ $post->blog_title }}</h6>
            @php
                $postunformated = $post->blog_content;
                $arrayvaluesformat = array('[', ']');
                $arrayvalues = array('<', '>');
                $postcontent = str_replace($arrayvaluesformat, $arrayvalues, $postunformated);
            @endphp
            <strong>{!! $postcontent !!}</strong>

        </div>
    </div>

@endsection
