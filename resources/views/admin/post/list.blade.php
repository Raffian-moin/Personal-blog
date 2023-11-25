@extends('admin.app')

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
                <h1>Post list</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">posts</a></div>
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
                                    <a href={{ route('posts.create') }} class="btn btn-primary">Add</a>
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
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Tags</th>
                                            <th>Created at</th>
                                            <th>Publish</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>
                                                    @foreach ($post->tags as $key => $tag)
                                                        <span class="badge badge-secondary mb-1">{{ $tag->name }}</span>

                                                    @endforeach
                                                </td>
                                                <td>{{ date_format($post->created_at, "Y-m-d") }}</td>
                                                <td ><div class="badge badge-{{ $post->is_published ? 'success' : 'danger' }}">{{ $post->is_published ? 'Yes' : 'No' }}</div></td>
                                                <td>
                                                    <div class="dropdown d-inline mr-2">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                                            <a class="dropdown-item" href={{ route('posts.view', $post->id) }}>View</a>
                                                            <form action={{ route('posts.delete', $post->id) }} method="POST">
                                                                <button type="submit" value="{{ $post->id }}" onclick="return confirm('Are you sure?')" class="btn btn-link dropdown-item">
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
