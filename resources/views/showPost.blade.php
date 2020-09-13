@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  Posts <small style="color:black;"></small></h6>  <br>
                @include('admin.include.alerts.errors')
                @include('admin.include.alerts.success')
                <form action="" method="get">
                    @csrf

            <div class="card-body">


                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Body</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td>{{$posts->id }}</td>
                                    <td>{{$posts ->title}}</td>
                                    <td>{{$posts->body}}</td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
