@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  Books <small style="color:black;">{{$books -> count()}}</small></h6>  <br>
                @include('admin.include.alerts.errors')
                @include('admin.include.alerts.success')
                <form action="" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="search" value="" >
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="category_id">
                                <optgroup label="Please choose Category To search"></optgroup>
                                <option class="hidden">-----</option>
                                @inject('categories','App\Models\Category')
                                @foreach($categories ->all() as $category)
                                    <option value="{{ $category->id}}">
                                        {{$category ->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> search</button>

                            <a class="btn btn-primary btn-icon-split " href="{{route('book.create')}}"><span class="icon text-white-50"><i class="fas fa-plus"></i>
                                    </span>
                                <span class="text"> Add </span></a>

                        </div>

                    </div> {{-- end  row--}}

                </form> {{-- end form --}}

            </div>

            <div class="card-body">


                <div class="table-responsive text-nowrap">
                    @if(isset($books)&&count($books))
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Name</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Roof</th>
                            <th>Student Borrow</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>In Roof</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($books as $index=> $book)

                            <td>{{$index +1 }}</td>
                            <td>{{$book ->name}}</td>
                            <td><img src="{{$book ->photo}}" style="width: 100px;height: 100px" alt=""></td>
                                <td>{{$book ->title}}</td>
                                <td>{{$book ->description}}</td>
                                <td>{{$book ->getFound()}}</td>
                                <td>
                                    <a href="{{route('student-borrow',$book->id)}}" class="btn btn-primary btn-circle btn-lg"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('book.edit',$book->id)}}" class="btn btn-primary btn-circle btn-lg"><i class="fas fa-info-circle"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('book.destroy',$book->id)}}" method="post" >
                                        {{csrf_field()}}
                                        {{method_field('delete')}}

                                        <button type="submit" class="btn btn-danger btn-circle btn-lg"> <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                                <td>
                                    <a href="{{route('book.status',$book->id)}}" class="btn btn-success btn-circle btn-lg">@if($book->found==1)<i class="fas fa-check"></i>@else <i class="fas fa-times"></i> @endif </a>
                                </td>
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
