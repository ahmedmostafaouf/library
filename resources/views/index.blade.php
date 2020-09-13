@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  Posts <small style="color:black;">{{$posts -> count()}}</small></h6>  <br>
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
                    @if(isset($posts)&&count($posts))
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Edit</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($posts as $index=> $post)

                                    <td>{{$index +1 }}</td>
                                    <td>{{$post ->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td><a href="{{route('edit.post',$post->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{route('show.post',$post->id)}}" class="btn btn-success ">show</a></td>
                                    <td><a href="{{route('delete.post',$post->id)}}" class="btn btn-danger">Delete</a></td>
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
