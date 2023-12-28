@extends('frontend.app')

@section('categories')
    <header class="container py-4 border-bottom">
        <p>Categories</p>
        @foreach($categories as $category)
            <a href={{ route('categories.slug', $category->slug) }} class="btn btn-light btn-outline-secondary mb-1">{{ $category->name }}</a>
        @endforeach
    </header>
@endsection

@section('main')
    <main class="py-4">
        <section class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div>
                    <a href={{ route('posts.key', 'recent') }} class="btn btn-outline-dark">Recent</a>
                        <a href={{ route('posts.key', 'top') }} class="btn btn-outline-dark">Top</a>
                    </div>
                </div>

                @foreach($posts as $post)
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <a href="./pages/post-details.html" class="post_card">
                        <img src="https://roar.media/wp-content/uploads/2023/11/9-1536x803.jpg" alt="">
                        <p>{{ $post->title }}</p>
                        <span>{{ $post->created_at }}</span>
                    </a>
                </div>
                @endforeach

            </div>

        </section>
    </main>
@endsection
