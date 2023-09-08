@extends('admin.app')

@section('main-section')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>View Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">categories</a></div>
                    <div class="breadcrumb-item active"><a href={{ route('categories.index') }}>list</a></div>
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
                                        <a href={{ route('categories.create') }} class="btn btn-primary">Add</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="font-weight-bold">Name</label>
                                        <p>{{ $category->name }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Status</label>
                                        <p>{{ $category->status ? 'Active' : 'Inactive' }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="font-weight-bold">Created at</label>
                                        <p>{{ date_format($category->created_at, "Y-m-d") }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Last updated at</label>
                                        <p>{{ date_format($category->updated_at, "Y-m-d h:i A") }}</p>
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
