@extends('frontend.app')

@push('stylesheet')
<link rel="stylesheet" href="{{ asset('admin/assets/css/easyMDECodeblockCustomization.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/css/postCoverImage.css') }}">
@endpush

@section('main')
    <main class="container">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="details_container py-4">
                    <h1>{{ $post->title }}</h1>
                    <div class="d-flex justify-content-between pt-2 pb-4">
                        <span class="text-muted">{{ date_format($post->created_at, "j F Y")  }}</span>

                        <a href={{ route('categories.slug', $post->category->slug) }}>
                            <div class="cetagory_container">
                            <span>{{ $post->category->name }}</span>
                        </div></a>

                    </div>

                    {!! $post->body !!}
                </div>

                @include('frontend.post.related_posts')

            </div>

            @include('frontend.post.sidebar')

        </section>
    </main>
@endsection

@push('scripts')
<script src="{{ asset('admin/js/codeblockCopyButton.js') }}"></script>
@endpush
