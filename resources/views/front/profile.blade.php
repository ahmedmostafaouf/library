@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="donation.html">Profile</a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{auth()->user()->name}} : Information about  </li>
            </ol>
        </nav><!--End Breadcrumb-->
        <section class="Status-details">
            <div class="container">
                <div class="Status-info p-3 my-4">
                    <div class="row">
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">{{auth()->user()->name}}</p>
                            <p class="status-item float-right p-3">name</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">{{\Carbon\Carbon::parse(auth()->user()->dop)->diff(\Carbon\Carbon::now())->format('%y')}}</p>
                            <p class="status-item float-right p-3">Age</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">{{auth()->user()->email}}</p>
                            <p class="status-item float-right p-3">Email</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">{{auth()->user()->address}}</p>
                            <p class="status-item float-right p-3">Address</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">{{auth()->user()->phone}}</p>
                            <p class="status-item float-right p-3">Phone</p>
                        </div>
                    </div><!--End row-->
                    <div class="text-center my-3"><button type="button" class="btn bg px-5">Edit Profile</button></div>
                    <div class="border p-3 my-3">
                        <div class="container">
                                <form action="{{route('edit.student.profile')}}" method="POST" class="w-75 m-auto">

                                    <input type="hidden" name="id" value="{{request()->user()->id}}">
                                    @csrf
                                    @include('admin.include.alerts.errors')
                                    @include('admin.include.alerts.success')
                                    <div class="form-group">
                                        <label>Name  </label>
                                        <input class="form-control" type="text" value="{{request()->user()->name}}" name="name" >
                                        @error("name")
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" name="email" value="{{request()->user()->email}}" class="form-control">
                                            @error("email")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label >date Of Birth</label>
                                            <input type="date"  id="datepicker" name="dop" value="{{request()->user()->dop}}" class="form-control">
                                            <div class="input-group">
                                                @error("dop")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address </label>
                                        <input type="address"  id="datepicker" name="address" value="{{request()->user()->address}}" class="form-control">

                                                @error("address")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input type="text" name="phone" class="form-control " value="{{request()->user()->phone}}">
                                        @error("phone")
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
            </div><!--End Container-->
        </section><!--End Status section-->
    </div><!--End container-->
@endsection
