@extends('layouts.app')

@section('title', 'Index Reply')

@section('content-body')
    @include('partials.session-message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Reply</h3>

            <div class="card-tools">
                <a href="{{ route('replies.create') }}" class="btn btn-danger btn-flat ml-2"><i class="fas fa-plus"></i> Nuevo</a>
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
                </tr>
                </thead>
                <tbody>
                @forelse ($replies as $reply)
                    <tr>
                        <td>{{ $reply->id }}</td>
                        <td>{{ $reply->author }}</td>
                        <td>{{ $reply->email }}</td>
                        <td height="50">{{ $reply->body }}</td>
                        <td>{{ $reply->created_at->diffForHumans() }}</td>
                        <td class="text-center">
                            @if($reply->is_active == 1)
                                <form action="{{ route('replies.update', $reply->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="is_active" value="0">
                                    <button type="submit" class="btn btn-outline-success btn-sm border-0 rounded"><i class="fas fa-power-off"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('replies.update', $reply->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="is_active" value="1">
                                    <button type="submit" class="btn btn-outline-danger btn-sm border-0 rounded"><i class="fas fa-power-off"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
                                @csrf @method('DELETE')
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
                Showing {!! $replies->firstItem() !!} to {!! $replies->lastItem() !!} of {!! $replies->total() !!} entries
                {!! $replies->links() !!}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
