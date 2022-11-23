@extends('layouts.app')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('adm.categories.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Name Category</label>
                        <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Name Category">
                        @error('name')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success">ADD</button>
                </form>
            </div>
        </div>
    </div>

@endsection

