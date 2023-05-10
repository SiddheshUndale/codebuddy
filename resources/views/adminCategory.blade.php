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
                                    <label class="control-label my-2">Parent Category</label>
                                    <select class="form-control" name="category_id" title="Select Parent Category">
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
                        <h3>Nested Categories in a Tree view</h3>
                        @foreach ($categories as $item)
                            <li class="treeview" style="list-style-type: none">
                                <i class="fa fa-link"></i> <span>{{ $item->name }}</span>
                                <a href="getDetails/{{ $item->id }}"><i class="fa fa-edit pull-right text-dark"></i></a>
                                <a href="delete/{{ $item->id }}"><i class="fa fa-close pull-right text-danger"></i></a>
                                <ul class="treeview-menu" style="list-style-type: none">
                                    @foreach ($item['categories'] as $child)
                                        <li>{{ $child->name }}
                                            <a href="getDetails/{{ $child->id }}"><i
                                                    class="fa fa-edit text-dark pull-right"></i></a>
                                            <a href="delete/{{ $child->id }}"><i
                                                    class="fa fa-close text-dark pull-right"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <h3>All Category List</h3>
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
                                @if ($categoriesAll)
                                    @foreach ($categoriesAll as $key => $cat)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $cat['name'] }}</td>
                                            <td>{{ $cat['category_id'] == null ? 'Main Category' : 'Sub Category' }}</td>
                                            <td>{{ $cat['created_at'] }}</td>
                                            <td><a href="delete/{{ $cat->id }}">Remove</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="w-100 text-center">
                            @if ($categoriesAll && count($categoriesAll) <= 0)
                                <h5>No Category Available</h5>
                            @endif
                        </div>
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
