@extends('layouts.app')

@section('title','USERS PAGE')

@section('content')
    <div class="container">
        <form action="{{route('adm.gifts.search')}}" method="GET">

            <div class="row align-items-center">
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingInput">Name</label>
                    <input type="text" class="form-control" id="autoSizingInput" name="name" placeholder="Name gifts">
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingInputGroup">from price</label>
                    <div class="input-group">
                        <input type="number" min="0" class="form-control" id="autoSizingInputGroup"
                               placeholder="from price" name="from_price">
                    </div>
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingInputGroup">to price</label>
                    <div class="input-group">
                        <input type="number" min="0" class="form-control" id="autoSizingInputGroup"
                               placeholder="to price" name="to_price">
                    </div>
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingSelect">Categories</label>
                    <select class="form-select" id="autoSizingSelect" name="category">
                        @foreach($categories as $cat)
                            @foreach($cat->categories as $c)
                                <option value="{{$c->id}}" disabled>{{$c->name}}</option>
                                @foreach($c->categories as $cs)
                                    <option value="{{$cs->id}}">--{{$cs->name}}</option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
        <form action="{{route('adm.gifts.search')}}">
        <div class="row justify-content-end">
            <div class="col-auto">
                    <select class="form-select" id="autoSizingSelect" name="sortBy">
<<<<<<< HEAD
                        <option value="1">Sort by recently gifts</option>
                        <option value="2">Sort by old gifts</option>
                        <option value="3">Sort by cheap gift</option>
                        <option value="4">Sort by expensive gift</option>
                        <option value="5">Sort by Name Gifts</option>
                        <option value="6">Sort by Content</option>
=======
                        <option value="1">Sort by zhana gifts</option>
                        <option value="2">Sort by eski gifts</option>
                        <option value="3">Sort by arzan gift</option>
                        <option value="4">Sort by qymbat gift</option>
                        <option value="5">Sort by Name Gifts</option>
                        <option value="6">Sort by Rating down</option>
                        <option value="6">Sort by Rating up</option>
>>>>>>> a6434a9 (first commit)
                    </select>

            </div>
            <div class="col-auto">
                <button class="btn btn-success">Sort</button>
            </div>
        </div>
        </form>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">DETAILS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0;$i<count($gifts);$i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$gifts[$i]->name}}</td>
                            <td>{{$gifts[$i]->content}}</td>
                            <td>{{$gifts[$i]->price}}</td>
                            <td>{{$gifts[$i]->category->name}}</td>
                            <td>
                                <a href="" class="btn btn-success">DETAILS</a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

