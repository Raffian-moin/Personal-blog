@extends('admin.app')

@section('main-section')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">categories</a></div>
                    <div class="breadcrumb-item active"><a href={{ route('categories.index') }}>list</a></div>
                    <div class="breadcrumb-item"><a href="#">create</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($category, ['route' => ['categories.update', $category->id]]) !!}
                            @include('admin.category.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

