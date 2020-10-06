@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav><!--End Breadcrumb-->
        <section class="about-us my-4 py-5">
            <div class="text-center"><img src="{{asset('assests/front/imgs/logo6.png')}}"> </div>
            <div class="about-US-content px-4 mb-5">
                <p class="my-md-4 arrow text-left">
                    The International Library of Books helps us to know the books in the library and make borrowings through the Internet
                </p>
                <p class="my-md-4 arrow text-left">
                    The International Library of Books helps us to know the books in the library and make borrowings through the Internet

                    The International Library of Books helps us to know the books in the library and make borrowings through the Internet

                    The International Library of Books helps us to know the books in the library and make borrowings through the Internet


                </p>
                <p class="my-md-4 arrow text-left">
                    Al-Mustafa's team built the site in order to help some people easily borrow books from the library, prevent overcrowding while there, and also help to know if the book is available in the library or not. </p>
            </div>
        </section><!--End about-us-->
    </div><!--End container-->
@endsection
