@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  Students <small style="color:black;">{{$students -> count()}}</small></h6>  <br>
                @include('admin.include.alerts.errors')
                @include('admin.include.alerts.success')
                <form action="" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="search" value="" >
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> search</button>
                        </div>

                    </div> {{-- end  row--}}

                </form> {{-- end form --}}

            </div>

            <div class="card-body">


                <div class="table-responsive">
                    @if(isset($students)&&count($students))
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date Of Barth</th>
                            <th>Borrow Request</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($students as $index=> $student)

                            <td>{{$index +1 }}</td>
                            <td>{{$student ->name}}</td>
                            <td>{{$student ->photo}}</td>
                            <td>{{$student ->email}}</td>
                            <td>{{$student ->address}}</td>
                            <td>{{$student ->dop}}</td>
                            <td>
                                <a href="{{route('books-request',$student ->id)}}" class="btn btn-primary btn-circle btn-lg"> <i class="fas fa-eye"></i>  </a>
                            </td>
                                <td>

                                    <form action="{{route('student.destroy',$student->id)}}" method="post" >
                                        {{csrf_field()}}
                                        {{method_field('delete')}}

                                        <button type="submit" class="btn btn-danger btn-circle btn-lg"> <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                        </tr>


                        @endforeach

                        </tbody>
                    </table>
                    {{$students->appends(request()->query())->links()}}
                    @else
                        <h2>data not found</h2>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
