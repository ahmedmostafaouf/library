@extends('layouts.master')

@section('content')
    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="signup text-center">
        @include('admin.include.alerts.errors')
        @include('admin.include.alerts.success')
        <div class="container">
            <div class="py-4 mb-4">
                <div class="text-center"><img src="{{asset('assests/front/imgs/logo6.png')}}"> </div>
                <form action="{{route('front.register')}}" method="POST" class="w-75 m-auto">
            @csrf

            <div class="form-group">
                <input type="text" name="name" class="form-control my-3 text-left" placeholder="Name">
                <div class="input-group">
                @error("name")
                <span class="text-danger">{{$message}} </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control my-3 text-left" placeholder="Email">
                <div class="input-group">
                @error("email")
                <span class="text-danger">{{$message}} </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="date"  id="datepicker" name="dop" class="form-control text-left" placeholder="Date Of Birth">
                    <div class="input-group">
                    @error("dop")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                <input type="text" name="phone" class="form-control my-3 text-left" placeholder="Phone">
                </div>
                    <div class="input-group">
                    @error("phone")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                    </div>
            </div>
            <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" id="datepicker" name="address" class="form-control text-left" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
                <div class="input-group">
                    <div class="input-group">
                @error("address")
                <span class="text-danger">{{$message}} </span>
                @enderror
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                <input type="password" name="password" class="form-control my-3 text-left" placeholder="Password">
                <div class="input-group">
                    @error("password")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>
                </div>
            </div>
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control my-3 text-left" placeholder="repeat Password">
            <div class="input-group">
              @error("password_confirmation")
            <span class="text-danger">{{$message}} </span>
            @enderror
            </div>

          </div>
            <button type="submit" class="btn btn-success py-2 w-50">Send</button>
        </form>
            </div>
        </div>

    </section>
@endsection
