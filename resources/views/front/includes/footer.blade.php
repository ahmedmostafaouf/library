
<!--Footer-->
<footer>
    <div class="main-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4  offset-1">
                    <div><img src="{{asset('assests/front/imgs/logo4.png')}}" style="width: 173px;height: 87px"> </div>

                    <h5 class="my-3 arrow text-center" style="color: #da1c23"><b>the library</b></h5>
                    <p class="pl-4 arrow text-left">The International Library of Books helps us to know the books in the library and make borrowings through the Internet
                    </p>
                </div>
                <div class="col-md-3">
                    <h6 class="">Home</h6>
                    <ul class="list-unstyled">
                        <li class="py-2"><a href="{{route('books')}}">Books</a></li>
                        <li class="py-2"><a href="{{route('student-borrow-request')}}">About Borrows</a></li>
                        <li class="py-2"><a href="{{route('about.us')}}">About us</a></li>
                        <li class="py-2"><a href="{{route('contact.me')}}">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 available">
                    <h6 class="mb-5">Available on</h6>
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
                    <p class="text-center">All rights reserved to <span>ITI</span> &copy; 2020</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Footer-->
