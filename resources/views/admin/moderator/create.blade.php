@extends('layouts.app')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('adm.categories.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">1</label>
                        <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="1 ші этаптағы санат">
                        @error('name')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">2</label>
                        <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="2 ші этаптағы санат">
                        @error('name')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">3</label>
                        <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="3 ші этаптағы санат">
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

