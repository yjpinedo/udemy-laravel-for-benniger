@extends('layouts.app')

@section('title', 'Media')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
@endsection

@section('content-body')
    @include('partials.errors-validation')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Create Media</strong></h3>
        </div>
        <div class="card-body">
            <form class="dropzone" id="my-awesome-dropzone" action="{{ route('medias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts-add')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
@endsection
