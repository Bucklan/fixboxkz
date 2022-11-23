@extends('layouts.app')

@section('title','EDIT-COMMENT PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('gift.show',$comment->gift->id)}}" class="btn btn-success center">< Go to Back</a>
                <form action="{{route('comments.update',$comment->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <textarea name="text" class="form-control @error('text') is-invalid @enderror" placeholder="Leave a comment here"
                              id="floatingTextarea">{{$comment->text}}</textarea>
                    @error('text')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <div class="py-3">
                        <button class="btn btn-success">Update comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
