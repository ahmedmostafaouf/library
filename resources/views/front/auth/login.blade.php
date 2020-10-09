@extends('layouts.master')

@section('content')
    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav><!--End Breadcrumb-->
    <section class="signup-form my-4 py-4">
        @include('admin.include.alerts.errors')
        @include('admin.include.alerts.success')
        <div class="text-center"><img src="{{asset('assests/front/imgs/logo6.png')}}"> </div>
        <form action="" class="w-75 mx-auto my-5" method="POST">
            @csrf
            <input type="text" name="phone" class="form-control my-3 py-3 text-left" id="phone" placeholder="Phone">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="password" name="password" class="form-control my-3 py-3 text-left" id="usPassword" placeholder="Password">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-check float-right my-4">
                <input class="form-check-input" type="checkbox" checked value="" name="remember" id="defaultCheck2">
                <label class="form-check-label" for="defaultCheck2">
                    Remember Me
                </label>
            </div>
            <div class="float-left my-4"><a href=""><i class="fas fa-exclamation-triangle px-2"></i><span>Forget Your Password</span></a></div>
            <div class="clr"></div>
            <div class="form-row my-4">
                <div class="col">
                    <button type="submit" class="form-control py-3 bg-success text-white">Login</button>
                </div>
                <div class="col">
                    <a href="{{route('get.front.register')}}" type="submit" class="form-control text-center py-3 bg">New Account</a>
                </div>
            </div>
        </form>
    </section>
    </div>
@endsection
