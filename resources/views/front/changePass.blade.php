@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item"><a href="{{route('get.student.profile')}}">الملف الشخصى</a></li>
                <li class="breadcrumb-item active" aria-current="page">معلومات  عن : {{auth()->user()->name}}</li>
            </ol>
        </nav><!--End Breadcrumb-->
        <section class="Status-details">
            <div class="container">
                <div class="Status-info p-3 my-4">
                    <div class="border p-3 my-3">
                        <div class="container">
                            <form action="{{route('edit.student.Pass')}}" method="POST" class="w-75 m-auto">

                                <input type="hidden" name="id" value="{{request()->user()->id}}">
                                @csrf
                                @include('admin.include.alerts.errors')
                                @include('admin.include.alerts.success')
                                <div class="form-group">
                                    <label>كلمة المرور القديمة  </label>
                                    <input class="form-control" type="password"  name="oldPassword" >
                                    @error("oldPassword")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>كلمة المرور الجديدة </label>
                                    <input type="password" name="newPassword" class="form-control">
                                    @error("newPassword")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label >تأكيد كلمه المرور</label>
                                    <input type="password"   name="newPassword_confirmation"  class="form-control">
                                    <div class="input-group">
                                        @error("newPassword_confirmation")
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control">تعديل كلمة المرور</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div><!--End Container-->
        </section><!--End Status section-->
    </div><!--End container-->
@endsection
