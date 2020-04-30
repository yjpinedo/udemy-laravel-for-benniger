@extends('layouts.app')

@section('title', 'Index Post')

@section('content-body')
@include('partials.session-message')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Pots</h3>

      <div class="card-tools">
            <a href="{{ route('posts.create') }}" class="btn btn-danger btn-flat ml-2"><i class="fas fa-plus"></i> Nuevo</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive col-12 p-3">
        <div>
            <div class="input-group input-group">
                <input type="text" class="form-control" type="search" placeholder="Search" aria-label="Search">
                <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
                </span>
            </div>
        </div>
        <table class="table table-hover mt-2">
          <thead>
            <tr>
              <th>N°</th>
              <th>image_id</th>
              <th>user_id</th>
              <th>title</th>
              <th>created at</th>
              <th>update at</th>
              <th colspan="3" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>
                @isset($post->image)
                  <img src="{{ asset($post->image->file) }}" class="img-size-50">
                @else
                <img src="{{ asset('img/guest.png') }}" alt="" class="img-size-50">
                @endisset
              </td>
              <td>
                @isset($post->user)
                  <span>{{ $post->user->name }}</span>
                @else
                  <span>No tiene usuarios</span>
                @endisset
              </td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->created_at->diffForHumans() }}</td>
              <td>{{ $post->updated_at->diffForHumans() }}</td>
              <td class="text-center">
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light btn-sm"><i class="fas fa-edit"></i></a>
                    <button class="btn btn-light btn-sm"><i class="fas fa-trash-restore"></i>
                    </button>
                </form>
              </td>
            </tr>
            @empty
                <tr>
                  <td>No existen registros</td>
                </tr>
            @endforelse
          </tbody>
        </table>
    </div>
      <div class="card-footer bg-white">
      <div class="d-flex justify-content-between align-item-center">

        Showing {!! $posts->firstItem() !!} to {!! $posts->lastItem() !!} of {!! $posts->total() !!} entries


        {!! $posts->links() !!}
      </div>
      </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
