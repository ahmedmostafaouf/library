@extends('layouts.master')

@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client-home')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item"> الكتب المستعارة</li>

            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->

    <!--Articles section-->
    <section class="articles mb-5">
        <div class="title">
            <div class="container">
                <h5><span class="py-1">قائمة الكتب المستعارة</span></h5>
                <div class="container"></div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        @if(isset($borrowRequest)&&count($borrowRequest))
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name Of Book</th>
                                    <th>Borrow Date</th>
                                    <th>Accept</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($borrowRequest as $index=> $borrow)
                                        <td>{{$index +1 }}</td>
                                        <td>{{$borrow ->book_name}}</td>
                                        <td>{{$borrow ->created_at->format('Y-m-d')}}</td>
                                        <td>{{$borrow ->getStatus()}}</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <h2>data not Found </h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
               <!--End container-->
    </section>
    <!--End Articles-->
    <!--Footer-->
@endsection
