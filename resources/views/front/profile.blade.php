@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item"><a href="donation.html">الملف الشخصى</a></li>
                <li class="breadcrumb-item active" aria-current="page">معلومات  عن : {{auth()->user()->name}}</li>
            </ol>
        </nav><!--End Breadcrumb-->
        <section class="Status-details">
            <div class="container">
                <div class="Status-info p-3 my-4">
                    <div class="row">
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">الأسم</p>
                            <p class="status-item float-right p-3">{{auth()->user()->name}}</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">العمر</p>
                            <p class="status-item float-right p-3">{{\Carbon\Carbon::parse(auth()->user()->dop)->diff(\Carbon\Carbon::now())->format('%y')}}</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">الأميل</p>
                            <p class="status-item float-right p-3">{{auth()->user()->email}}</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">العنوان</p>
                            <p class="status-item float-right p-3">{{auth()->user()->address}}</p>
                        </div>
                        <div class="col-md-6 clearfix">
                            <p class="status float-right p-3">رقم الجوال</p>
                            <p class="status-item float-right p-3">{{auth()->user()->phone}}</p>
                        </div>
                    </div><!--End row-->
                    <div class="text-center my-3"><button type="button" class="btn bg px-5">التفاصيل</button></div>
                    <div class="border p-3 my-3">
                        <div class="container">
                                <form action="{{route('edit.student.profile')}}" method="POST" class="w-75 m-auto">

                                    <input type="hidden" name="id" value="{{request()->user()->id}}">
                                    @csrf
                                    @include('admin.include.alerts.errors')
                                    @include('admin.include.alerts.success')
                                    <div class="form-group">
                                        <label>الاسم  </label>
                                        <input class="form-control" type="text" value="{{request()->user()->name}}" name="name" >
                                        @error("name")
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>البريد الاليكترونى </label>
                                        <input type="text" name="email" value="{{request()->user()->email}}" class="form-control">
                                            @error("email")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label >تاريخ الميلاد</label>
                                            <input type="date"  id="datepicker" name="dop" value="{{request()->user()->dop}}" class="form-control">
                                            <div class="input-group">
                                                @error("dop")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label>العنوان </label>
                                        <input type="address"  id="datepicker" name="address" value="{{request()->user()->address}}" class="form-control">

                                                @error("address")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>رقم الهاتف </label>
                                        <input type="text" name="phone" class="form-control " value="{{request()->user()->phone}}">
                                        @error("phone")
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control">ارسال</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
            </div><!--End Container-->
        </section><!--End Status section-->
    </div><!--End container-->
@endsection
