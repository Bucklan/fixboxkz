@extends('layouts.app2')

@section('title','DETAILS PAGE')
@section('content')
    <div class="content">
        <div class="intro-y news xl:w-3/5 p-5 box mt-8">
            <!-- BEGIN: Blog Layout -->
            <h2 class="intro-y font-medium text-xl sm:text-2xl">
                {{$gift->name}}
            </h2>
            <div class="intro-y text-slate-600 dark:text-slate-500 mt-3 text-xs sm:text-sm">{{$gift->created_at->day}}
                .{{$gift->created_at->month}}.{{$gift->created_at->year}}<span class="mx-1">•</span> <a
                    class="text-primary" href="">{{$gift->category->name}}</a> <span
                    class="mx-1">•</span>{{$gift->created_at->hour}}:{{$gift->created_at->minute}}</div>
            <div class="intro-y mt-6">
                <div class="news__preview image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-md"
                         src="{{asset('/storage/images/gifts/'.$gift->image)}}">
                </div>
            </div>
<<<<<<< HEAD
            {{$count}}
            @if($avg != 0)
                    <div class="flex items-center">
                        @for($i=0;$i<$avg;$i++)
                        <i data-lucide="star" class="text-pending fill-pending/30 w-4 h-4 mr-1"></i>
                        @endfor
                        @for($i = 5;$i>$avg;$i--)
                                <i data-lucide="star" class="text-slate-400 fill-slate/30 w-4 h-4 mr-1"></i>
                            @endfor
                    </div>
=======
            @if($avg != 0)
                <div class="flex items-center">
                    @for($i=0;$i<$avg;$i++)
                        <i data-lucide="star" class="text-pending fill-pending/30 w-4 h-4 mr-1"></i>
                    @endfor
                    @for($i = 5;$i>$avg;$i--)
                        <i data-lucide="star" class="text-slate-400 fill-slate/30 w-4 h-4 mr-1"></i>
                    @endfor
                </div>
>>>>>>> a6434a9 (first commit)
                <div class="text-xs text-slate-500 ml-1">{{$avg}}+</div>
            @endif

            @auth()
                @if($like)
                    <form action="{{route('gifts.like',$gift->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="like" value="false">
<<<<<<< HEAD
                        <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg></button>
=======
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        </button>
>>>>>>> a6434a9 (first commit)
                    </form>
                @else
                    <form action="{{route('gifts.like',$gift->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="like" value="true">
<<<<<<< HEAD
                        <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg></button>
=======
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        </button>
>>>>>>> a6434a9 (first commit)
                    </form>
                @endif
                <form action="{{route('gifts.rate',$gift->id)}}" method="post">
                    @csrf
                    <select name="rating">
                        @for($i=0;$i<=5;$i++)
                            <option
                                {{ $myRating==$i ? 'selected' : ''}} value="{{$i}}">{{ $i==0 ? 'Not rated':$i}}</option>

                        @endfor
                    </select>
                    <button class="btn btn-success">ADD</button>
                </form>
                <form action="{{route('gifts.unrate',$gift->id)}}" method="post">
                    @csrf
                    <button class="btn btn-success">Clear</button>
                </form>
            @endauth
            <div class="intro-y flex relative pt-16 sm:pt-6 items-center pb-6">
                <div
                    class="absolute sm:relative -mt-12 sm:mt-0 w-full flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm">
                    <div class="intro-x mr-1 sm:mr-3"> Comments: <span
                            class="font-medium">{{count($gift->comments)}}</span></div>
<<<<<<< HEAD
                    <div class="intro-x mr-1 sm:mr-3"> Views: <span class="font-medium"></span></div>
                    <div class="intro-x sm:mr-3 ml-auto"> Likes: <span class="font-medium"></span></div>
=======
                    <div class="intro-x mr-1 sm:mr-3"> Likes: <span class="font-medium">            {{$count}}
</span></div>
>>>>>>> a6434a9 (first commit)
                </div>
                <a href=""
                   class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto sm:ml-0 tooltip"
                   title="Share"> <i data-lucide="share-2" class="w-3 h-3"></i> </a>
                <a href=""
                   class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full bg-primary text-white ml-2 tooltip"
                   title="Download PDF"> <i data-lucide="share" class="w-3 h-3"></i> </a>
            </div>
            <div class="intro-y text-justify leading-relaxed">
                <p class="mb-5">{{$gift->content}}</p>
            </div>
            <div class="text-base sm:text-lg font-medium">{{$gift->price}} KZT</div>
            <form action="{{route('cart.puttocart',$gift->id)}}" method="post">
                @csrf
<<<<<<< HEAD
                <input type="number" name="number" placeholder="count gift">
=======
>>>>>>> a6434a9 (first commit)
                <button class="btn btn-dark">CART</button>
            </form>
            <div
                class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="flex items-center">
                    <div class="w-12 h-12 flex-none image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                             src="{{asset('/storage/image/users/'.$gift->user->image)}}">
                    </div>
                    <div class="ml-3 mr-auto">
                        <a href="" class="font-medium">{{$gift->user->name}}</a>, Author
<<<<<<< HEAD
                        <div class="text-slate-500">{{$gift->user->role->name}}</div>
=======
>>>>>>> a6434a9 (first commit)
                    </div>
                </div>
            </div>
            <!-- END: Blog Layout -->
            <!-- BEGIN: Comments -->
            <div class="intro-y mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="text-base sm:text-lg font-medium">{{count($gift->comments)}} Responses</div>
                @can('create',App\Models\Comment::class)
                    <form action="{{route('comments.store')}}" method="post">
                        @csrf
                        <div class="news__input relative mt-5">
                            <input type="hidden" value="{{$gift->id}}" name="gift_id">

                            <i data-lucide="message-circle"
                               class="w-5 h-5 absolute my-auto inset-y-0 ml-6 left-0 text-slate-500"></i>
                            <input name="text"
                                   class="form-control border-transparent bg-slate-100 pl-16 py-6 resize-none"
                                   placeholder="Post a comment...">
                        </div>
                    </form>
                @endcan
            </div>
            @isset($gift->comments)
                @foreach($gift->comments as $com)
                    <div class="intro-y mt-5 pb-10">
                        <div class="pt-5">
                            <div class="flex">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                         src="{{asset('/storage/image/users/'.$com->user->image)}}">
                                </div>
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center"><a href=""
                                                                      class="font-medium">{{$com->user->name}}</a>
                                        @auth
<<<<<<< HEAD
                                            <form action="{{route('gift.destroy',$gift->id)}}" method="post">
                                                @csrf
                                                <div class="dropdown ml-3 justify-content-end">
                                                    <a href="javascript:;"
                                                       class="dropdown-toggle w-5 h-5 text-slate-500"
                                                       aria-expanded="false" data-tw-toggle="dropdown"> <i
                                                            data-lucide="more-vertical" class="w-4 h-4"></i>
                                                    </a>
                                                    <div class="dropdown-menu w-40">
                                                        <ul class="dropdown-content">
                                                            @method('DELETE')
                                                            @can('delete',$com)
=======
                                            @can('delete',$com)
                                                <form action="{{route('gift.destroy',$gift->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="dropdown ml-3 justify-content-end">
                                                        <a href="javascript:;"
                                                           class="dropdown-toggle w-5 h-5 text-slate-500"
                                                           aria-expanded="false" data-tw-toggle="dropdown"> <i
                                                                data-lucide="more-vertical" class="w-4 h-4"></i>
                                                        </a>

                                                        <div class="dropdown-menu w-40">
                                                            <ul class="dropdown-content">


>>>>>>> a6434a9 (first commit)
                                                                <li>
                                                                    <a href="" class="dropdown-item"> <i
                                                                            data-lucide="trash"
                                                                            class="w-4 h-4 mr-2"></i>
                                                                        Edit Post </a>
                                                                </li>
<<<<<<< HEAD
                                                            @endcan
                                                            @can('update',$com)
=======
>>>>>>> a6434a9 (first commit)
                                                                <li>
                                                                    <a href="" class="dropdown-item"> <i
                                                                            data-lucide="edit-2"
                                                                            class="w-4 h-4 mr-2"></i>
                                                                        Delete Post </a>
                                                                </li>
<<<<<<< HEAD
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </div>
=======
                                                            </ul>
                                                        </div>

                                                    </div>@endcan
>>>>>>> a6434a9 (first commit)
                                        @endauth
                                    </div>
                                    <div class="text-slate-500 text-xs sm:text-sm">{{$com->created_at->hour}}
                                        :{{$com->created_at->minute}}</div>
                                    <div class="mt-2">{{$com->text}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        @endif
        <!-- END: Comments -->
        </div>
    </div>
@endsection
