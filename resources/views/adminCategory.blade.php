@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Category') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('category.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group row my-4">
                                <div class="col-12">
                                    <legend class="text-secondary">Add Category</legend>
                                </div>
                                <div class="col-6">
                                    <label class="control-label my-2">Category Name*</label>
                                    <input class="form-control" type="text" name="name"
                                        placeholder="Enter Category Name" required>
                                </div>
                                <div class="col-6">
                                    <label class="control-label my-2">Project Type</label>
                                    <select class="form-control" name="category_id" title="Select Project Type">
                                        <option value="" selected>
                                            None</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat['id'] }}"
                                                {{ $cat['id'] == old('id') ? 'selected' : null }}>
                                                {{ $cat['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-12 btn-center-align">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Create Category
                                    </button>&nbsp;&nbsp;&nbsp;
                                    <a href="dashboard" class="btn btn-secondary"><i
                                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </div>
                        </form>
                        <h3>Category List</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoriesAll as $key => $cat)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $cat['name'] }}</td>
                                        <td>{{ $cat['category_id'] == null ? 'Main Category' : 'Sub Category' }}</td>
                                        <td>{{ $cat['created_at'] }}</td>
                                        <td><a href="delete/{{ $cat->id }}">Remove</a></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="category">
                            <a href="dashboard" class="btn btn-secondary float-end"><i
                                    class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
