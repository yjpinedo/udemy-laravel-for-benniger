@extends('layouts.app')

@section('title', 'Media')

@section('content-body')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Images</strong></h3>
            <a href="{{ route('medias.create') }}" class="btn btn-primary float-right btn-flat"><i class="fas fa-plus-circle"></i> Nuevo</a>
        </div>
        <div class="row">
                @foreach($images as $image)
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="card">
                                <img src="{{ $image->imageExisting() ? asset($image->file) : asset('img/default-image.jpg') }}"  height="200" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="text-center">{{ $image->file }}</h5>
                                    <hr>
                                    <form action="{{ route('medias.destroy', $image->id) }}" method="post">
                                        @csrf @method('DELETE')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            <p class="text-right m-0 p-0"><em class="text-cyan">{{ $image->created_at->diffForHumans() }}</em></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-item-center">
                Showing {!! $images->firstItem() !!} to {!! $images->lastItem() !!} of {!! $images->total() !!} entries
                {!! $images->links() !!}
            </div>
        </div>
    </div>
@endsection

