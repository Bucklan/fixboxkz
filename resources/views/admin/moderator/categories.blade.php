@extends('layouts.app')

@section('title','CATEGORY PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" width="25%">#</th>
                        <th scope="col" width="25%">Name</th>
                        <th scope="col" width="25%">Code</th>
                        <th scope="col" width="25%">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $categor)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$categor->name}}</td>
                            <td>
                                <a href="{{route('adm.categories.show',$categor->id)}}" class="btn btn-success">DETAILS</a>
                            </td>
                            @foreach($categor->categories as $cat)
                                <td>--{{$cat->name}}</td>
                                <td>
                                    <a href="{{route('adm.categories.show',$cat->id)}}" class="btn btn-success">DETAILS</a>
                                </td>
                                @foreach($cat->categories as $ct)
                                    <td>----{{$ct->name}}</td>
                                    <td>
                                        <a href="{{route('adm.categories.show',$ct->id)}}" class="btn btn-success">DETAILS</a>
                                    </td>
                                @endforeach
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

