@extends('layouts.master')

@section('content')
    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Borrow Request</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="signup text-center">
        @include('admin.include.alerts.errors')
        @include('admin.include.alerts.success')
        <div class="container">
            <div class="py-4 mb-4">
                <div class="text-center"><img src="{{asset('assests/front/imgs/logo6.png')}}"></div> <br> <br>
                <form action="{{route('push-borrow-request')}}" method="POST" class="w-75 m-auto">
            @csrf
                    <input type="text"  id="datepicker" hidden disabled name="user_id" value="{{auth()->user()->id}}" class="form-control">
                    <input type="text" name="book_id" hidden value="{{$books->id}}" class="form-control my-3" placeholder="book_id">
                    <input type="text"  hidden name="book_name" value="{{$books->name}}" class="form-control my-3" placeholder="Book name">
            <div class="form-group">
                <label>The time the book is retrieved</label>
                <input type="date" name="Too" class="form-control my-3" placeholder="The time the book is retrieved">
                @error("Too")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Book Name</label>
                <input type="text"  disabled name="books_name" value="{{$books->name}}" class="form-control my-3 text-left" placeholder="book Name">
                @error("book_name")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text"  id="datepicker" disabled name="user_name" value="{{auth()->user()->name}}" class="form-control text-left" placeholder="Student name">
                </div>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="{{auth()->user()->phone}}" disabled class="form-control text-left " placeholder="Phone">
            </div>
                <label>Address</label>
                <input type="text" disabled id="datepicker" name="address" value="{{auth()->user()->address}}" class="form-control text-left" placeholder="Address">
                @error("address")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success py-2 w-50">Send</button>
            </div>
        </form>
            </div>
        </div>

    </section>
@endsection
