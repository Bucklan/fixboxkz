@extends('layouts.app')

@section('title','EDIT PAGE')

@section('content')

    <div class="container">
        <a href="{{route('gift.show',$gift->id)}}" class="btn btn-success">Go to Back</a>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('gift.update',$gift->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nameproduct" class="form-label">Product Name product</label>
                        <input type="text" id="nameproduct" name="name"
                               class="form-control @error('name') is-invalid @enderror" placeholder="Name Product"
                               value="{{$gift->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                aria-label="Default select example">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}" @if($cat->id==$gift->category_id) selected @endif>
                                    --{{$cat->name}}</option>

                                @foreach($cat->categories as $c)
                                    <option value="{{$c->id}}"
                                            @if($c->id==$gift->category_id) selected @endif>{{$c->name}}</option>
                                    @foreach($c->categories as $cs)
                                        <option value="{{$cs->id}}"
                                                @if($cs->id==$gift->category_id) selected @endif>
                                            --{{$cs->name}}</option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Content" class="form-label">Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                  id="Content" placeholder="Required example textarea">{{$gift->content}}</textarea>
                        @error('content')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" min="0" id="price" name="price"
                               class="form-control @error('price') is-invalid @enderror" value="{{$gift->price}}"
                               placeholder="Price product">

                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image product</label>
                        <input class="form-control @error('img') is-invalid @enderror" id="image" value="{{$gift->img}}"
                               type="file" accept="image/png, image/jpeg" name="img">

                        @error('img')
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


