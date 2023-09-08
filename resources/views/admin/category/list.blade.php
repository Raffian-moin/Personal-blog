@extends('admin.app')

@section('main-section')
    <div class="main-content">
        @if (session('success'))
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif

        <section class="section">
            <div class="section-header">
                <h1>Category list</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">categories</a></div>
                    <div class="breadcrumb-item"><a href="#">list</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row card-header">
                                <div class="text-start">
                                    <p>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Search
                                    </a>
                                    </p>
                                </div>
                                <div class="text-end">
                                    <a href={{ route('categories.create') }} class="btn btn-primary">Add</a>
                                </div>
                                <div class="collapse" id="collapseExample">
                                    <p>search form goes here</p>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped v_center">
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                            <th>Created at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ date_format($category->created_at, "Y-m-d") }}</td>
                                                <td ><div class="badge badge-{{ $category->status ? 'success' : 'danger' }}">{{ $category->status ? 'Active' : 'Inactive' }}</div></td>
                                                <td>
                                                    <div class="dropdown d-inline mr-2">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                                            <a class="dropdown-item" href={{ route('categories.view', $category->id) }}>View</a>
                                                            <form action={{ route('categories.delete', $category->id) }} method="POST">
                                                                <button type="submit" value="{{ $category->id }}" onclick="return confirm('Are you sure?')" class="btn btn-link dropdown-item">
                                                                    Delete
                                                                </button>
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
