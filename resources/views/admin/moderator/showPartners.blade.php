@extends('layouts.app')

@section('title','Partner PAGE')
@section('content')
    {{$partner->name_company}}
<<<<<<< HEAD
    <form action="{{route('adm.partners.is_partner',$partner->id)}}" method="post">
        @csrf
        <button >YES</button>
    </form>
    <form action="{{route('adm.partners.destroy',$partner->id)}}" method="post">
        @csrf
        @method('DELETE')
    </form>
=======

>>>>>>> 39935d4 (first commit)
@endsection
