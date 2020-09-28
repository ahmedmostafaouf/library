@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">من نحن</li>
            </ol>
        </nav><!--End Breadcrumb-->
        <section class="about-us my-4 py-5">
            <div class="my-5 text-center"> <h3 style="color:darkred">About Us</h3> </div>
            <div class="about-US-content px-4 mb-5">
                <p class="my-md-4">
                    المكتبه الدوليه للكتب تساعدنا علي معرفه الكتب في المكتبه وعمل استعاره عن طريق الانترنت
                </p>
                <p class="my-md-4">
                    المكتبه الدوليه للكتب تساعدنا علي معرفه الكتب في المكتبه وعمل استعاره عن طريق الانترنت
                    المكتبه الدوليه للكتب تساعدنا علي معرفه الكتب في المكتبه وعمل استعاره عن طريق الانترنت
                    المكتبه الدوليه للكتب تساعدنا علي معرفه الكتب في المكتبه وعمل استعاره عن طريق الانترنت
                </p>
                <p class="my-md-4">
                    قام فريق المصطفى ببناء الموقع لكى يساعد البعض على سهولة استعاره الكتب من المكتبة ومنع التكدس اثناء التواجد ويساعد ايضا علي معرفه اذا كان الكتبه متوفر في المكتبة او لا  </p>
            </div>
        </section><!--End about-us-->
    </div><!--End container-->
@endsection
