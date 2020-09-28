@extends('layouts.master')

@section('content')
    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="signup text-center">
        @include('admin.include.alerts.errors')
        @include('admin.include.alerts.success')
        <div class="container">
            <div class="py-4 mb-4">
        <form action="{{route('front.register')}}" method="POST" class="w-75 m-auto">
            @csrf

            <div class="form-group">
                <input type="text" name="name" class="form-control my-3" placeholder="الاسم">
                <div class="input-group">
                @error("name")
                <span class="text-danger">{{$message}} </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control my-3" placeholder="البريد الاليكترونى">
                <div class="input-group">
                @error("email")
                <span class="text-danger">{{$message}} </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="date"  id="datepicker" name="dop" class="form-control" placeholder="تاريخ الميلاد">
                    <div class="input-group">
                    @error("dop")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                <input type="text" name="phone" class="form-control my-3" placeholder="رقم الهاتف">
                </div>
                    <div class="input-group">
                    @error("phone")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                    </div>
            </div>
            <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" id="datepicker" name="address" class="form-control" placeholder="العنوان" aria-label="Username" aria-describedby="basic-addon1">
                <div class="input-group">
                    <div class="input-group">
                @error("address")
                <span class="text-danger">{{$message}} </span>
                @enderror
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                <input type="password" name="password" class="form-control my-3" placeholder="كلمة المرور">
                <div class="input-group">
                    @error("password")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>
                </div>
            </div>
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control my-3" placeholder="تأكيد كلمة المرور">
            <div class="input-group">
              @error("password_confirmation")
            <span class="text-danger">{{$message}} </span>
            @enderror
            </div>

          </div>
            <button type="submit" class="btn btn-success py-2 w-50">ارسال</button>
        </form>
            </div>
        </div>

    </section>
@endsection
