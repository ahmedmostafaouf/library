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
                    @if(isset($students)&&count($students))
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
                            @foreach($students as $index=> $student)
                            <td>{{$index +1 }}</td>
                            <td>{{$student ->book_name}}</td>
                                <td>{{$student ->created_at->format('Y-m-d')}}</td>
                                <td>{{$student ->getStatus()}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @else
                        <h2>data not found</h2>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
