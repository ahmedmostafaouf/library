@extends('layouts.master')
@section('content')
    <!--main-header-->
    <div class="main-header">
        <div class="slide">
            <img src="{{asset('assests/front/imgs/meme.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="slide">
            <img src="{{asset('assests/front/imgs/bookme.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="slide">
            <img src="{{asset('assests/front/imgs/bookme.jpg')}}" class="d-block w-100" alt="...">
        </div>

    </div>
    <!--End main-header-->
    <!--Articles section-->
    <section class="articles py-5">
        <div class="arrow text-left">
            <div class="container">
                <h2><span class="py-1 arrow text-left">Books</span> </h2>
            </div>
            <hr />
        </div>
        <div class="article-slide mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="arrow text-right">
                            <button type="button" class="prev-arrow px-2 py-1"><i
                                    class="fas fa-chevron-right"></i></button>
                            <button type="button" class="next-arrow px-2 py-1"><i
                                    class="fas fa-chevron-left"></i></button>
                        </div>
                    </div>
                </div>
                <div class="slick2">
                    @foreach($books  as $book)
                    <div class="slick-cont">
                        <div class="card">
                            <div class="heart-icon"><a href="{{route('borrow-request',$book->id)}}"><i id="{{$book->id}}" class="fas fa-heart"></i></a>
                            </div>
                            <img src="{{$book->photo}}" class="card-img-top" alt="slick-img" style="width:330px;height: 200px; ">

                            <div class="card-body text-left">
                                <h5 class="card-title">{{$book->title}}</h5>
                                <p> ...... {{ mb_substr($book ->description,0,20)}}
                                </p>
                                <div class="text-center"><a href="{{route('details-books',$book->id)}}" class="btn bg px-5">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!--End container-->
    </section>
    <!--End Articles-->

    <!--Contact-us-->
    <section class="contact-us py-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="contact-info col-md-6 col-sm-12 text-center">
                    <h4 class="text-center"><span class="brd">Contact Us</span> </h4>
                    <p class="my-5">You can contact us to inquire about information and we will reply</p>
                    <div class="phone-nm mx-auto">
                        <p class="text-right" href=""><span class=""></span> 01066273085</p>
                        <img src="{{asset('assests/front/imgs/whats.png')}}" alt="whats-phone">
                    </div>
                </div>
            </div>
        </div>
        <!--End container-->
    </section>
    <!--End Contact-us-->
    <!--blood-app-->
    <section class="blood-app py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-6"><img src="{{asset('assests/front/imgs/bookstore.jpg')}}" class="img-fluid" alt=""></div>

                <div class="col-md-6 arrow text-left">
                    <h4 class="mt-5 mb-4">Library App</h4>
                    <p class="appText">The International Library of Books helps us to know the books in the library and make borrowings through the Internet</p>
                    <div class="text-center avilb">
                        <h5 class="my-4">Available on</h5>
                        <img src="{{asset('assests/front/imgs/google.png')}}" alt="">
                        <img src="{{asset('assests/front/imgs/ios.png')}}" alt="">
                    </div>
                </div>


            </div>
            <!--End row-->
        </div>
        <!--End container-->
    </section>
@endsection
