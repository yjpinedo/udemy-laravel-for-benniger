@extends('layouts.app')

@section('title', 'Users - Index')

@section('content-body')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Responsive Hover Table</h3>

      <div class="card-tools">
            <a href="" class="btn btn-danger btn-flat ml-2"><i class="fas fa-plus"></i> Nuevo</a>
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
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created_At</th>
            <th colspan="3" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @isset($user->role)
                    <em>{{ $user->role->name }}</em>
                @else
                    <em>Not role</em>
                @endisset
            </td>
            <td>
                @if($user->is_active == 1)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Not Active</span>
                @endif
            </td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td class="text-center">
              <form action="#">
                  <a href="#" class="btn btn-light btn-sm"><i class="fas fa-eye"></i></a>
                  <a href="#" class="btn btn-light btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-light btn-sm"><i class="fas fa-trash-restore"></i></a>
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

        Showing {!! $users->firstItem() !!} to {!! $users->lastItem() !!} of {!! $users->total() !!} entries


        {!! $users->links() !!}
      </div>
      </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
