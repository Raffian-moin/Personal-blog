@extends('admin.app')

@push('stylesheet')
<link rel="stylesheet" href="{{ asset('admin/assets/css/easyMDECodeblockCustomization.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/css/postCoverImage.css') }}">
@endpush

@section('main-section')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>View Post</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">posts</a></div>
                    <div class="breadcrumb-item active"><a href={{ route('posts.index') }}>list</a></div>
                    <div class="breadcrumb-item"><a href="#">view</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <a href={{ route('posts.create') }} class="btn btn-primary">Add</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="font-weight-bold">Name</label>
                                        <p>{{ $post->title }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Slug</label>
                                        <p>{{ $post->slug}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="font-weight-bold">Category</label>
                                        <p>{{ $post->category->name }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Tags</label><br>
                                        @php
                                            $tagCount = count($post->tags);
                                        @endphp
                                        @foreach ($post->tags as $key => $tag)
                                            {{ $tag->name }}
                                            @if ($key < $tagCount - 1)
                                                {{ '|' }}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="font-weight-bold">Published</label>
                                        <p>{{ $post->is_published ? 'Yes' : 'No' }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Cover Image</label>
                                        <p>{{ $post->cover_image}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="font-weight-bold">Total Views</label>
                                        <p>{{ $post->total_views }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Unique Views</label>
                                        <p>{{ $post->unique_views }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="font-weight-bold">Created at</label>
                                        <p>{{ date_format($post->created_at, "Y-m-d") }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Last updated at</label>
                                        <p>{{ date_format($post->updated_at, "Y-m-d h:i A") }}</p>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid black;">
                                <div class="row">
                                    <div class="col-12">
                                        {!! $post->body !!}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('admin/js/codeblockCopyButton.js') }}"></script>
@endpush
