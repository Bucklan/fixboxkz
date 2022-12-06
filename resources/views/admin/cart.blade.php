@extends('layouts.app')

@section('title','USERS PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Name Gift</th>
                        <th scope="col">Number gift</th>
                        <th scope="col">Status</th>
                        <th scope="col">Confirm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 1;$i<=count($giftsInCart);$i++)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$giftsInCart[$i-1]->gift->name}}</td>
                            <td>{{$giftsInCart[$i-1]->user->name}}</td>
                            <td>{{$giftsInCart[$i-1]->number}}</td>
                            <td>{{$giftsInCart[$i-1]->status}}</td>
                            <td>
                                <form action="{{route('adm.cart.confirm',$giftsInCart[$i-1]->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success">Confirm</button>
                                </form>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

