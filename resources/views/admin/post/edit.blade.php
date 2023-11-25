@extends('admin.app')

@push('stylesheet')
<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
<link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/css/postCoverImage.css') }}">
@endpush

@section('main-section')
    <div class="main-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
        <section class="section">
            <div class="section-header">
                <h1>Add Post</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">posts</a></div>
                    <div class="breadcrumb-item active"><a href={{ route('posts.index') }}>list</a></div>
                    <div class="breadcrumb-item"><a href="#">create</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put', "enctype" => "multipart/form-data"]) !!}
                            @method('PUT')
                            @include('admin.post.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

