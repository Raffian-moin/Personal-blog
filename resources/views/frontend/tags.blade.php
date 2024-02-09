@extends('frontend.app')

@section('sub-main')
    <header class="container py-4 border-bottom">
        <p>Tags</p>
        @foreach($tags as $tag)
            <a href={{ route('categories.slug', $tag->slug) }} class="btn btn-light btn-outline-secondary mb-1">{{ $tag->name }}</a>
        @endforeach
    </header>
@endsection
