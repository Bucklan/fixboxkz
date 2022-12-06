@extends('layouts.app')

@section('title','USERS PAGE')

@section('content')
    <div class="container">
        <div class="row">
            @for($i = 0;$i<count($partners);$i++)
                @if($partners[$i]->partner!=null && $partners[$i]->partner->is_partner==false)
                    <div class="col-4 mt-3">
                        <a href="{{route('adm.partners.show',$partners[$i]->partner->id)}}">
                            <div class="card text-center" style="color: black">
                                <img src="{{asset('/storage/images/partner/photos/'.$partners[$i]->partner->image)}}"
                                     class="card-img-top"
                                     width="250" height="300" alt="Hollywood Sign on The Hill"/>
                                <div class="card-body">
                                    <h5 class="card-title">{{$partners[$i]->partner->name_company}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endfor
        </div>
    </div>


@endsection

