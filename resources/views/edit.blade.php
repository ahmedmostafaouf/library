
@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  Edit Post </h6>
            </div>
        </div>
        <div class="box-body">
            <div class="card-body">
                <form action="{{route('update.post',$posts->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Title </label>
                            <input class="form-control" type="text" name="title" value="{{$posts->title}}">
                            @error("title")
                            <span class="text-danger">{{$message}} </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Body </label>
                            <input class="form-control" type="text" name="body" value="{{$posts->body}}" >
                            @error("body")
                            <span class="text-danger">{{$message}} </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-icon-split" type="submit" >
                                    <span class="icon text-white-50"><i class="fas fa-plus"></i>
                                    </span>
                                <span class="text"> Update </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>{{--end box body--}}
        </div>



</div>
</div>
<!-- /.container-fluid -->
@endsection
