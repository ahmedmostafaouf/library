
@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Student (number)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@inject('students','App\Models\User'){{  $students->all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('student.index')}}"> <i class="fas fa-user fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Books (Number)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@inject('books','App\Models\Book'){{$books->all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('book.index')}}"> <i class="fas fa-book-reader fa-2x text-gray-300"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Borrows (numbers)</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">@inject('borrows','App\Models\BorrowRequest'){{$borrows->count()}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('borrowRequest.index')}}"> <i class="fas fa-book fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending (Borrows)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@inject('borrowsAppend','App\Models\BorrowRequest') {{$borrowsAppend->where('status',0)->count()}} </div>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('borrowRequest.index')}}"> <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Illustrations -->

    <div class="col-xl-12 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">About Us</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('assests/img/undraw_posting_photo.svg')}}" alt="">
                </div>
                <p>An online library that helps you to borrow any book at any time and easy to use <a target="_blank" rel="nofollow" href="https://https://www.facebook.com/profile.php?id=100004246381723/">Al-Mustafa's team</a>, built the site in order to help some people easily borrow books from the library, prevent overcrowding while there, and also help to know if the book is available in the library or not.</p>
                <a target="_blank" rel="nofollow" href="{{route('client-home')}}">Browse The Site here &rarr;</a>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->
@endsection
