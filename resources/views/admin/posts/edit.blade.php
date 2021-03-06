@extends('layouts.app')

@section('content-title', 'Edit Post')

@section('content-body')
    @include('partials.errors-validation')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title"><strong>Create Pots</strong></h3>
        </div>
        <div class="text-center">
            @isset($post->image)
                <img width="300px" src="{{ asset($post->image->file) }}" alt="" class="img-fluid">
            @else
                <img width="300px" src="{{ asset('img/guest.png') }}" alt="" class="img-fluid">
            @endisset
        </div>
        <div class="card-body">
            <form class="" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select id="category_id" class="form-control" name="category_id">
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id || $post->category_id == $category->id ? 'selected' : ""}}>{{ $category->name }}</option>
                        @empty
                            <option value="0">Not Categories</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group">
                    <label for="image_id">File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image_id">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" name="body" id="body">{{ old('body', $post->body) }}</textarea>
                </div>
                <div class="btn-group">
                    <a href=" {{ route('posts.index') }} " class="btn btn-default btn-flat"><i class="fas fa-arrow-left"></i> Return</a>
                    <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-paper-plane"></i> Send</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts-add')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
