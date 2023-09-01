@extends('admin.app')

@section('main-section')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Tag</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">tags</a></div>
                    <div class="breadcrumb-item active"><a href={{ route('tags.index') }}>list</a></div>
                    <div class="breadcrumb-item"><a href="#">add</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'tags.store']) !!}
                            @csrf
                            @include('admin.tag.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
