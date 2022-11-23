@extends('layouts.app')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('gift.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nameproduct" class="form-label">Name Gifts</label>
                        <input type="text" id="nameproduct" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Name Gifts" >
                        @error('name')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Content" class="form-label">Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="Content" placeholder="Required example textarea" ></textarea>
                        @error('content')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" min="0" id="price" name="price" class="form-control @error('price') is-invalid @enderror"  placeholder="Price product" >

                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image product</label>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" accept="image/png, image/gif, image/jpeg" name="image">

                        @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                            @foreach($categories as $cat)
                            @foreach($cat->categories as $c)
                                    <option value="{{$c->id}}" disabled>{{$c->name}}</option>
                                    @foreach($c->categories as $cs)
                                        <option value="{{$cs->id}}">--{{$cs->name}}</option>
                                    @endforeach
                                @endforeach
                            @endforeach
{{--                            @foreach($categories as $cat)--}}
{{--                                @if($cat->parent_id!=null)--}}
{{--                                    <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-success">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

