@extends('layouts.app')

@section('title', 'Media')

@section('content-body')
    @include('partials.errors-validation')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Create Media</strong></h3>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('medias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image_id">File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image_id">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-paper-plane"></i> Send</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->

    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Images</strong></h3>
        </div>
        <div class="d-flex">
            @foreach($images as $image)
                <div class="card-body">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($image->file) }}"  height="200" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="">
                                <h5 class="">{{ $image->file }}</h5>
                                <p class="text-right m-0 p-0"><em class="text-cyan">{{ $image->created_at->diffForHumans() }}</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
