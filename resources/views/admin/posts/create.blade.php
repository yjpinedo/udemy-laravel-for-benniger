@extends('layouts.app')

@section('title', 'Create Post')

@section('content-body')
    @include('partials.errors-validation')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title"><strong>Create Pots</strong></h3>
        </div>
            <div class="card-body">
                <form class="" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body">{{ old('body') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_id">File</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image_id">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
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
