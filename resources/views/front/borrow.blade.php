@extends('layouts.master')

@section('content')
    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">"طلب استعارة"</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="signup text-center">
        @include('admin.include.alerts.errors')
        @include('admin.include.alerts.success')
        <div class="container">
            <div class="py-4 mb-4">
        <form action="{{route('push-borrow-request')}}" method="POST" class="w-75 m-auto">
            @csrf
            <input type="text"  hidden name="book_name" value="{{$books->name}}" class="form-control my-3" placeholder="اسم الكتاب">

            <div class="form-group">
                <label>عدد ايام الاستعارة</label>
                <input type="text" name="number_of_days" class="form-control my-3" placeholder="عدد ايام الاستعارة">
                @error("number_of_days")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <label>الوقت التى يتم استرجاع فيه الكتاب</label>
                <input type="date" name="Too" class="form-control my-3" placeholder="الوقت التى يتم استرجاع فيه الكتاب">
                @error("Too")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <label>اسم الكتاب</label>
                <input type="text"  disabled name="books_name" value="{{$books->name}}" class="form-control my-3" placeholder="اسم الكتاب">
                @error("book_name")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>اسم الطالب</label>
                    <input type="text"  id="datepicker" disabled name="user_name" value="{{auth()->user()->name}}" class="form-control" placeholder="تاريخ الميلاد">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <input type="text"  id="datepicker" hidden disabled name="user_id" value="{{auth()->user()->id}}" class="form-control" placeholder="تاريخ الميلاد">

                </div>
            </div>

            <div class="form-group">
                <label>رقم الهاتف</label>
                <input type="text" name="phone" value="{{auth()->user()->phone}}" disabled class="form-control " placeholder="رقم الهاتف">
            </div>
                <label>العنوان</label>
                <input type="text" disabled id="datepicker" name="address" value="{{auth()->user()->address}}" class="form-control" placeholder="العنوان">
                @error("address")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="input-group">
                <input type="text" name="book_id" hidden value="{{$books->id}}" class="form-control my-3" placeholder="كلمة المرور">
                <div class="input-group">
                    @error("password")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>
                </div>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success py-2 w-50">ارسال</button>
            </div>
        </form>
            </div>
        </div>

    </section>
@endsection
