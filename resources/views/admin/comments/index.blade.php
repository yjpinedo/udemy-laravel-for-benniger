@extends('layouts.app')

@section('title', 'Index Comments')

@section('content-body')
    @include('partials.session-message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Comments</h3>

            <div class="card-tools">
                <a href="{{ route('comments.create') }}" class="btn btn-danger btn-flat ml-2"><i class="fas fa-plus"></i> Nuevo</a>
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
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Created_At</th>
                    <th class="text-center">Is_active</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->author }}</td>
                        <td>{{ $comment->email }}</td>
                        <td height="50">{{ $comment->body }}</td>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td class="text-center">
                            @if($comment->is_active == 1)
                                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="is_active" value="0">
                                    <button type="submit" class="btn btn-outline-success btn-sm border-0 rounded"><i class="fas fa-power-off"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="is_active" value="1">
                                    <button type="submit" class="btn btn-outline-danger btn-sm border-0 rounded"><i class="fas fa-power-off"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('replies.show', $comment->id) }}" class="btn btn-outline-info border-0 btn-sm"><i class="fas fa-comment-dots" title="Comments"></i></a>
                                <button type="submit" class="btn btn-outline-danger border-0 btn-sm"><i class="fas fa-trash"></i></button>
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
                Showing {!! $comments->firstItem() !!} to {!! $comments->lastItem() !!} of {!! $comments->total() !!} entries
                {!! $comments->links() !!}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
