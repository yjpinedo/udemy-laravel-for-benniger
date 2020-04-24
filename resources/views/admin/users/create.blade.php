@extends('layouts.app')

@section('content-title', 'Creat User')

@section('content-body')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
        </div>
        <form role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="btn-group d-flex justify-content-between align-content-center">
                    <a href="" class="btn btn-default"><i class="fas fa-arrow-left"></i> Return</a>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-paper-plane"></i> Send</button>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
@endsection
