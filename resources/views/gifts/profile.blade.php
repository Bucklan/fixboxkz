@extends('layouts.app2')

@section('title','PROFILE PAGE')

@section('content')
    <body class="py-5">
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Profile Layout
            </h2>
        </div>
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box px-5 pt-5 mt-5">
            <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{asset('/storage/image/users/'.$user->image)}}">
                    </div>
                    <div class="ml-5">
                        <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$user->name}}</div>
                        <div class="text-slate-500">{{$user->role->name}}</div>
                    </div>
                </div>
                <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                    <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                        <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i>{{$user->email}}</div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="instagram" class="w-4 h-4 mr-2"></i> Instagram NuLL </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter Tom NuLL </div>
                    </div>
                </div>
                <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                    <div class="text-center rounded-md w-20 py-3">
                        <div class="font-medium text-primary text-xl">201</div>
                        <div class="text-slate-500">Orders</div>
                    </div>
                    <div class="text-center rounded-md w-20 py-3">
                        <div class="font-medium text-primary text-xl">1k</div>
                        <div class="text-slate-500">Purchases</div>
                    </div>
                    <div class="text-center rounded-md w-20 py-3">
                        <div class="font-medium text-primary text-xl">492</div>
                        <div class="text-slate-500">Reviews</div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
                <li id="profile-tab" class="nav-item" role="presentation">
                    <a href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Profile </a>
                </li>
                <li id="account-tab" class="nav-item" role="presentation">
                    <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-target="#account" aria-selected="false" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="shield"></i> Account </a>
                </li>
                <li id="change-password-tab" class="nav-item" role="presentation">
                    <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-target="#change-password" aria-selected="false" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="lock"></i> Change Password </a>
                </li>
                <li id="settings-tab" class="nav-item" role="presentation">
                    <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-target="#settings" aria-selected="false" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="settings"></i> Settings </a>
                </li>
            </ul>
        </div>
        <!-- END: Profile Info -->
        <div class="tab-content mt-5">
            <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: New Products -->
                    <div class="intro-y box col-span-12">
                        <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                New Products
                            </h2>
                            <button data-carousel="new-products" data-target="prev" class="tiny-slider-navigator btn btn-outline-secondary px-2 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                            <button data-carousel="new-products" data-target="next" class="tiny-slider-navigator btn btn-outline-secondary px-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                        </div>
                    </div>
                    <!-- END: New Products -->
                    <!-- BEGIN: New Authors -->
                    <div class="intro-y box col-span-12">
                        <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                New Partners
                            </h2>
                            <button data-carousel="new-authors" data-target="prev" class="tiny-slider-navigator btn btn-outline-secondary px-2 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                            <button data-carousel="new-authors" data-target="next" class="tiny-slider-navigator btn btn-outline-secondary px-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                        </div>
                        <div id="new-authors" class="tiny-slider py-5">
                            <div class="px-5">
                                <div class="flex flex-col lg:flex-row items-center pb-5">
                                    <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                        <div class="sm:mr-5">
                                            <div class="w-20 h-20 image-fit">
                                            </div>
                                        </div>
                                        <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                            <a href="" class="font-medium text-lg">Name Company</a>
                                            <div class="text-slate-500 mt-1 sm:mt-0">Category</div>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                        <div class="flex items-center">
                                            <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="facebook"></i> </a>
                                            Email Partners
                                        </div>
                                        <div class="flex items-center mt-2">
                                            <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="twitter"></i> </a>
                                            Author
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                    <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                        <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">23 August 2022</div>
                                        <div class="text-slate-500">Joined Date</div>
                                    </div>
                                    <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                        <button class="btn btn-secondary w-20 ml-auto">Message</button>
                                        <button class="btn btn-secondary w-20 ml-2">Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: New Authors -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
    <script src="dist/js/app.js"></script>
    <!-- END: JS Assets-->
    </body>
@endsection

