@extends('layouts.app')

@section('title', 'Users - Edit')

@section('content-title', 'Edit User')

@section('content-body')
    @include('partials.errors-validation')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title"><strong>Edit User</strong></h3>
        </div>
            <div class="card-body">
                <div class="text-center">
                    @isset($user->image)
                        <img width="300px" src="{{ asset($user->image->file) }}" alt="" class="img-fluid">
                    @else
                        <img width="300px" src="{{ asset('img/guest.png') }}" alt="" class="img-fluid">
                    @endisset
                </div>   
                <div class="">
                    <form class="" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="role{{ $role->id }}" value="{{ $role->id }}" {{ old('role_id') == $role->id || $role->id == $user->role->id ? 'checked' : ''}}>
                                    <label for="role{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Is Active</label>
                            <select class="form-control" name="is_active">
                                <option value="" {{ old('is_active') == "" ? 'selected' : ""}}>Choose option</option>
                                <option value="0" {{ old('is_active') == "0" || $user->is_active == 0 ? 'selected' : ""}}>Not active</option>
                                <option value="1" {{ old('is_active') == "1" || $user->is_active == 1 ? 'selected' : ""}}>Active</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image_id">File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image_id">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        <div class="btn-group">
                            <a href=" {{ route('users.index') }} " class="btn btn-default btn-flat"><i class="fas fa-arrow-left"></i> Return</a>
                            <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-paper-plane"></i> Send</button>
                        </div>
                    </form>   
                </div>
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