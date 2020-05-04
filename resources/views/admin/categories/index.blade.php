@extends('layouts.app')

@section('title', 'Index Category')

@section('content-body')
    @include('partials.session-message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categories</h3>

            <div class="card-tools">
                <a href="{{ route('categories.create') }}" class="btn btn-danger btn-flat ml-2"><i class="fas fa-plus"></i> Nuevo</a>
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
                    <th>Image</th>
                    <th>Created_At</th>
                    <th colspan="3" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <a href="#" class="btn btn-light btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-light btn-sm"><i class="fas fa-edit"></i></a>
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
                Showing {!! $categories->firstItem() !!} to {!! $categories->lastItem() !!} of {!! $categories->total() !!} entries
                {!! $categories->links() !!}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
