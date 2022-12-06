@extends('layouts.app2')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('partner.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" id="name" class="form-control"  placeholder="Your Name" readonly value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="text" id="email" class="form-control"  placeholder="Your Email" readonly value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="name_company" class="form-label">Your Company Name</label>
                        <input type="text" name="name_company" id="name_company" class="form-control"  placeholder="Your Company name">
                        @error('name_company')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Company (<em> format: PNG</em>)</label>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" accept="image/png" name="image">
                        @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

