@extends('layouts.adm2head')

@section('app2')
    <body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" src="dist/fixbox.png" width="150" height="150">
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                         src="dist/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        A few more clicks to
                        <br>
                        sign up to your account.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your
                        e-commerce accounts in one place
                    </div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign Up
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks
                        to sign in to your account. Manage all your e-commerce accounts in one place
                    </div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="intro-x mt-8">
                            <input type="text" name="name"
                                   class="intro-x login__input  py-3 px-4 block form-control @error('name') is-invalid @enderror"
                                   placeholder="First Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="text" name="email"
                                   class="intro-x login__input  py-3 px-4 block mt-4 form-control @error('email') is-invalid @enderror"
                                   placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="password" name="password"
                                   class="intro-x login__input py-3 px-4 block mt-4 form-control @error('password') is-invalid @enderror"
                                   placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="password" name="password_confirmation"
                                   class="intro-x login__input py-3 px-4 block mt-4 form-control"
                                   placeholder="Password Confirmation">
                            <input
                                class="intro-x login__input py-3 px-4 block mt-4 form-control @error('image') is-invalid @enderror"
                                id="image" type="file"
                                accept="image/png, image/gif, image/jpeg" name="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div
                            class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">I agree to the Envato</label>
                            <a class="text-primary dark:text-slate-200 ml-1" href="">Privacy Policy</a>.
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                            <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="dist/js/app.js"></script>
    <!-- END: JS Assets-->
    </body>
    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-8 offset-md-3 py-4">--}}
    {{--                <div class="card" style="width: 40rem;">--}}
    {{--                    <div class="card-header">--}}
    {{--                        <h4>{{ __('Register') }}</h4>--}}
    {{--                    </div>--}}

    {{--                    <div class="card-body">--}}
    {{--                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">--}}
    {{--                            @csrf--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <h5><label for="recipient-name" class="col-form-label">{{ __('Email Address') }}</label></h5>--}}
    {{--                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="recipient-name"--}}
    {{--                                       placeholder="Insert Email"--}}
    {{--                                       name="email">--}}
    {{--                                @error('email')--}}
    {{--                                <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <h5><label for="message-text" class="col-form-label">{{ __('Password') }}</label></h5>--}}
    {{--                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"--}}
    {{--                                       placeholder="Insert Password" minlength="2"--}}
    {{--                                       maxlength="20" size="20">--}}
    {{--                                @error('password')--}}
    {{--                                <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <h5><label for="message-text" class="col-form-label">{{ __('Confirm Password') }}</label></h5>--}}
    {{--                                <input type="password" class="form-control" name="password_confirmation"--}}
    {{--                                       placeholder="Insert Confirm Password" minlength="2"--}}
    {{--                                       maxlength="20" size="20">--}}
    {{--                            </div>--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <h5><label for="recipient-name" class="col-form-label">{{ __('Name') }}</label></h5>--}}
    {{--                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="recipient-name"--}}
    {{--                                       placeholder="Insert Full Name"--}}
    {{--                                       name="name">--}}
    {{--                                @error('name')--}}
    {{--                                <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <h5><label for="image" class="form-col-form-label">{{ __('User Image') }}</label></h5>--}}
    {{--                                <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" accept="image/png, image/gif, image/jpeg" name="image">--}}

    {{--                                @error('image')--}}
    {{--                                <div class="invalid-feedback">{{$message}}</div>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="mt-4">--}}
    {{--                                <button type="submit" class="btn btn-primary">--}}
    {{--                                        {{ __('Register') }}--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
    {{--                            </form>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}


@endsection
