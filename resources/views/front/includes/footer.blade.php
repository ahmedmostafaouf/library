
<!--Footer-->
<footer>
    <div class="main-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4  offset-1">
                    <h5 class="my-3" style="color: #da1c23">المكتبة</h5>
                    <p class="pl-4">المكتبه الدوليه للكتب تساعدنا علي معرفه الكتب في المكتبه وعمل استعاره عن طريق الانترنت
                    </p>
                </div>
                <div class="col-md-3">
                    <h6 class="">الرئيسية</h6>
                    <ul class="list-unstyled">
                        <li class="py-2"><a href="{{route('books')}}">الكتب</a></li>
                        <li class="py-2"><a href="{{route('student-borrow-request')}}">عن الاستعارة</a></li>
                        <li class="py-2"><a href="{{route('about.us')}}">من نحن</a></li>
                        <li class="py-2"><a href="{{route('contact.me')}}">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-4 available">
                    <h6 class="mb-5">متوفر على</h6>
                    <div class="my-3"><img src="{{asset('assests/front/imgs/google1.png')}}" alt=""></div>
                    <div class="my-3"><img src="{{asset('assests/front/imgs/ios1.png')}}" alt=""></div>
                </div>
            </div>
        </div>
        <!--End container-->
    </div>
    <!--End main-footer-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li class="d-inline-block mx-2"><a class="facebook" target="_blank" href=""><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="d-inline-block mx-2"><a class="insta" target="_blank" href=""><i
                                    class="fab fa-instagram"></i></a></li>
                        <li class="d-inline-block mx-2"><a class="twitter" target="_blank" href=""><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="d-inline-block mx-2"><a class="whatsapp" target="_blank" href=""><i
                                    class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p class="text-center">جميع الحقوق محفوظه لـ <span>المكتبة</span> &copy; 2019</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Footer-->
