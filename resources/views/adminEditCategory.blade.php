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
                        <form method="post">
                            {{ csrf_field() }}
                            <div class="form-group row my-4">
                                <div class="col-12">
                                    <legend class="text-secondary">Update Category</legend>
                                </div>
                                <div class="col-6">
                                    <label class="control-label my-2">Category Name*</label>
                                    <input class="form-control" type="text" name="name"
                                        placeholder="Enter Category Name" value="{{ $category->name }}" required>
                                </div>
                                <div class="col-6">
                                    <label class="control-label my-2">Parent Category</label>
                                    <select class="form-control" name="category_id" title="Select Parent Category">
                                        <option value="" selected>
                                            None</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat['id'] }}"
                                                @if ($category->category_id == $cat->id) selected @endif>
                                                {{ $cat['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row my-4 text-center">
                                <div class="col-md-12 btn-center-align">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Update Category
                                    </button>&nbsp;&nbsp;&nbsp;
                                    <a href="/admin/category" class="btn btn-secondary"><i
                                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
