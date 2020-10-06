@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  Books <small style="color:black;"></small></h6>  <br>
                @include('admin.include.alerts.errors')
                @include('admin.include.alerts.success')

            </div>

            <div class="card-body">


                <div class="table-responsive text-nowrap">
                    @if(isset($books)&&count($books))
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Of User</th>
                            <th>Borrow Date</th>
                            <th>Borrowing time (days)</th>
                            <th>Accept</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($books as $index=> $book)
                            <td>{{$index +1 }}</td>
                            <td>{{$book ->user_name}}</td>
                                <td>{{$book ->created_at->format('Y-m-d')}}</td>
                                <td> {{(strtotime($book->Too) - strtotime($book ->created_at->format('Y-m-d')))/60/60/24}}</td>
                                <td>{{$book ->getStatus()}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @else
                        <h2>data not </h2>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
