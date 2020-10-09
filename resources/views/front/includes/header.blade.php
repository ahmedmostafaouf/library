
<!--header section-->
<section class="header">
    <!--top-bar-->
    <div class="top-bar py-2">
        <div class="container">
            <!--row of top-bar-->
            <div class="d-flex justify-content-between">
                <div>
                    <a href="index.html" class="ar px-1">En</a>
                    <a href="" class="en px-1">عربي</a>
                </div>
                <div>
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
                @if(auth()->guard('web')->check())
                <div class="connect">
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <span> Welcome  </span> &nbsp; &nbsp;{{auth('web')->user()->name}}
                        </a>
                        <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('client-home')}}"> Home <i class="fas fa-home ml-2"></i></a>
                            <a class="dropdown-item" href="{{route('get.student.profile')}}"> Profile  <i class="fas fa-user-alt ml-2"></i></a>
                            <a class="dropdown-item" href="{{route('student-borrow-request')}}"> Borrow Books  <i class="far fa-heart ml-2"></i></a>
                            <a class="dropdown-item" href="{{route('get.student.EditPass')}}"> Edit password  <i class="far fa-comments ml-2"></i></a>
                            <a class="dropdown-item" href="{{route('contact.me')}}"> Contact Us  <i class="fas fa-phone ml-2"></i></a>
                            <a class="dropdown-item" href="{{route('client-logout')}}"> LogOut  <i class="fas fa-sign-out-alt ml-2"></i></a>
                        </div>
                    </div>
                </div>
                    @endif
            </div>
            <!--End row-->
        </div>
        <!--End container-->
    </div>
    <!--End top-bar-->
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('client-home')}}"><img src="{{asset('assests/front/imgs/logo7.png')}}" style="width: 122px;height: 70px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.us')}}">About us</a>
                    </li>
                    <li class="nav-item cont">
                        <a class="nav-link" href="{{route('contact.me')}}">Contact Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('student-borrow-request')}}">Borrow Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('books')}}">Books</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('client-home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @if(!auth()->guard('web')->check())
                    <li class="mr-lg-auto"><a class="signin" href="{{route('get.front.register')}}">New Account</a></li>
                    <li class="pr-3"><a class="btn bg" href="{{route('get.front.login')}}"> Login </a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!--End container-->
    </nav>
    <!--End Nav-->

</section>
<!--End Header-->




