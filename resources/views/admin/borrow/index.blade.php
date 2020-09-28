@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  Students <small style="color:black;">{{$borrowRequests -> count()}}</small></h6>  <br>
                @include('admin.include.alerts.errors')
                @include('admin.include.alerts.success')
                <form action="" method="get">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <select class="form-control" name="user_id">
                                <optgroup label="Please choose User To search"></optgroup>
                                <option class="hidden">-----</option>
                                @inject('users','App\Models\User')
                                @foreach($users ->all() as $user)
                                    <option value="{{ $user->id}}">
                                        {{$user ->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="book_id">
                                <optgroup label="Please choose Book To search"></optgroup>
                                <option class="hidden">-----</option>
                                @inject('books','App\Models\Book')
                                @foreach($books ->all() as $book)
                                    <option value="{{ $book->id}}">
                                        {{$book ->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> search</button>
                        </div>

                    </div> {{-- end  row--}}

                </form> {{-- end form --}}

            </div>

            <div class="card-body">


                <div class="table-responsive">
                    @if(isset($borrowRequests)&&count($borrowRequests))
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Number Of Days</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Book</th>
                            <th>Student</th>
                            <th>Roof</th>
                            <th>Accept</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($borrowRequests as $index=> $borrowRequest)

                            <td>{{$index +1 }}</td>
                            <td>{{$borrowRequest ->number_of_days}}</td>
                            <td>{{$borrowRequest ->created_at->format('Y-m-d')}}</td>
                            <td>{{$borrowRequest ->Too}}</td>
                            <td>{{$borrowRequest ->book->name}}</td>
                            <td>{{$borrowRequest ->user->name}}</td>
                                <td>
                                    <a href="{{route('roof.found',$borrowRequest->book->id)}}" class="btn btn-primary btn-circle btn-lg">@if($borrowRequest->book->found==1)<i class="fas fa-check"></i>@else <i class="fas fa-times"></i> @endif </a>
                                </td>
                                <td>
                                    <a href="{{route('borrow.accept',$borrowRequest->id)}}" class="btn btn-primary btn-circle btn-lg">@if($borrowRequest->status==1)<i class="fas fa-check"></i>@else <i class="fas fa-times"></i> @endif </a>
                                </td>
                                <td>

                                    <form action="{{route('borrowRequest.destroy',$borrowRequest->id)}}" method="post" >
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
                    {{$borrowRequests->appends(request()->query())->links()}}
                    @else
                        <h2>data not found</h2>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
