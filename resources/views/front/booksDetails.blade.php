@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('books')}}">Books</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$books->name}}</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="artice-detailes pb-5">
        <div class="container">
            <div class="article-img m-auto">
                <img src="{{$books->photo}}" class="card-img-top" alt="article-img">
            </div>
            <div class="article-content my-4 text-left">
                <div class="text-left article-header p-2 d-inline-block-flex justify-content-between">
                    <h6>{{$books->title}}</h6>
                </div>
                <div class="article-details p-4">
                    <p class="my-md-4">{{$books->description}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--Articles section-->
    <section class="articles mb-5">
        <div class="arrow text-left">
            <div class="container">
                <h5><span class="py-1 arrow text-left">Related books</span> </h5>
            </div>
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
                    @foreach($books ->where('found',1)->get() as $book)
                    <div class="slick-cont">
                        <div class="card">
                            <img src="{{$book->photo}}" class="card-img-top" alt="slick-img" style="width:330px;height: 200px;">
                            <div class="heart-icon"><a href="{{route('borrow-request',$book->id)}}"><i id="{{$book->id}}" class="fas fa-heart"></i></a></div>
                            <div class="card-body text-left">
                                <h5 class="card-title ">{{$book->title}}</h5>
                                <p> ...... {{mb_substr($book ->description,0,20)}}
                                </p>
                                <div class="text-center"><a href="{{route('details-books',$book->id)}}" class="btn bg px-5">Details</a></div>
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
@endsection
