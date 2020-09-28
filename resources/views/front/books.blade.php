@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item">الكتب</li>

            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->

    <!--Articles section-->
    <section class="articles mb-5">
        <div class="title">
            <div class="container">
                <h5><span class="py-1">قائمة الكتب</span></h5>
            </div>
        </div>
        <div class="article-slide mt-3">
            <div class="container">
                <div class="arrow text-left">
                    <button type="button" class="prev-arrow px-2 py-1"><i class="fas fa-chevron-right"></i></button>
                    <button type="button" class="next-arrow px-2 py-1"><i class="fas fa-chevron-left"></i></button>
                </div>

                <div class="slick2">
                    @foreach($books->all() as $book)
                        <div class="slick-cont">

                            <div class="card">
                                <img src="{{$book->photo}}" class="card-img-top" width="300px" height="250px" alt="slick-img">
                                <div class="heart-icon"><a href="{{route('borrow-request',$book->id)}}"><i id="{{$book->id}}" class="fas fa-heart"></i></a></div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->title}}</h5>
                                    <p>{{mb_substr($book ->description,0,20)}} ......
                                    </p>
                                    <div class="text-center"><a href="{{route('details-books' ,$book->id)}}"
                                                                class="btn bg px-5">التفاصيل</a></div>
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
    <!--Footer-->
@endsection
