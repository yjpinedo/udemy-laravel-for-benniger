@extends('layouts.app')

@section('title', 'Edit Category')

@section('content-body')
    @include('partials.errors-validation')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title"><strong>Edit Category</strong></h3>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
                </div>
                <div class="btn-group">
                    <a href=" {{ route('categories.index') }} " class="btn btn-default btn-flat"><i class="fas fa-arrow-left"></i> Return</a>
                    <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-paper-plane"></i> Update</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
