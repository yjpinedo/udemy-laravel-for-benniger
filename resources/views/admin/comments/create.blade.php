@extends('layouts.app')

@section('content-title', 'Create Category')

@section('content-body')
    @include('partials.errors-validation')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title"><strong>Create Category</strong></h3>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="btn-group">
                    <a href=" {{ route('categories.index') }} " class="btn btn-default btn-flat"><i class="fas fa-arrow-left"></i> Return</a>
                    <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-paper-plane"></i> Send</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
