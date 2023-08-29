@extends('admin.app')

@section('main-section')
    <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Tag list</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">tags</a></div>
                        <div class="breadcrumb-item"><a href="#">list</a></div>
                    </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row card-header">
                                    <div class="text-start">
                                        <h4>Advanced Table</h4>
                                    </div>
                                    <div class="text-end">
                                        <a href={{ route('tags.create') }} class="btn btn-primary">Add</a>
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
