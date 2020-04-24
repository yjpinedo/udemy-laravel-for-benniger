@extends('layouts.app')

@section('content-title', 'Index User')

@section('content-body')
<div class="row">
    <div class="col-8">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:82%">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>    
    </div>
    <div class="col-4">
        <a href="" class="btn btn-danger btn-block">Nuevo</a>
    </div>
</div>
@endsection
