@extends('layouts.app2')

@section('title','MAIN PAGE')

@section('content')
    <div class="content">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Main Page
            </h2>
        </div>
        <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        @foreach($AllGifts as $gift)
            <!-- BEGIN: Blog Layout -->
            <div class="intro-y col-span-12 md:col-span-6 box">
                <div class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-t-md" src="{{asset('/storage/images/gifts/'.$gift->image)}}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="w-10 h-10 flex-none image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{asset('/storage/image/users/'.$gift->user->image)}}">
                        </div>
                        <div class="ml-3 text-white mr-auto">
                            <a href="#" class="font-medium">{{$gift->user->name}}</a>
                            <div class="text-xs mt-0.5">{{$gift->created_at->day}}.{{$gift->created_at->month}}.{{$gift->created_at->year}}</div>
                        </div>
                        <div class="dropdown ml-3">
                            <a href="javascript:;" class="bg-white/20 dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4 text-white"></i> </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit Post </a>
                                    </li>
                                    <li>
                                        <form action="{{route('gift.destroy',$gift->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete Post </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-white/20 px-2 py-1 rounded">{{$gift->category->name}}</span> <a href="{{route('gift.show',$gift->id)}}" class="block font-medium text-xl mt-3">{{$gift->name}}</a> </div>
                </div>
                <div class="p-5 text-slate-600 dark:text-slate-500">{{$gift->content}}</div>
                <div class="flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto tooltip" title="Share"> <i data-lucide="share-2" class="w-3 h-3"></i> </a>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip" title="Download PDF"> <i data-lucide="share" class="w-3 h-3"></i> </a>
                </div>
                <div class="px-5 pt-3 pb-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-full flex text-slate-500 text-xs sm:text-sm">
                        <div class="mr-2"> Comments: <span class="font-medium">{{count($gift->comments)}}</span> </div>
                        <div class="mr-2"> Views: <span class="font-medium"></span> </div>
                        <div class="ml-auto"> Likes: <span class="font-medium"></span> </div>
                    </div>
                </div>
            </div>
        @endforeach
            <!-- END: Blog Layout -->
        </div>
    </div>
@endsection

