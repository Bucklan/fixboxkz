@extends('layouts.app2')

@section('title','CART PAGE')

@section('content')
    <div class="content">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Cart Page
            </h2>
        </div>
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <table class="table">
                    @foreach($giftsInCart as $gift)
                        <tr>
                            <td>{{$gift->name}}</td>
                            <td>{{$gift->price*$gift->pivot->number}} KZT</td>
                            <td>{{$gift->pivot->number}}</td>
                            <td>{{$gift->pivot->status}}</td>
                            <td>
                                <form action="{{route('cart.deletefromcart',$gift->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-dark">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        <form action="{{route('cart.buy')}}" method="post">
                @csrf
                <button class="btn btn-success">Buy</button>
            </form>
    </div>
@endsection

