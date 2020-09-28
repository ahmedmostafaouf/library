@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">  Edit Category </h6> <br>
                </div>
            </div>
            <div class="box-body">
                @include('admin.include.alerts.errors')
                @include('admin.include.alerts.success')
                <div class="card-body">
                    <form action="{{route('category.update',$categories->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{$categories->id}}"> {{-- عشان الصوره لو محبتش اغيرها --}}

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Name Of Category </label>
                                <input class="form-control" type="text" name="name" value="{{$categories->name}}">
                                @error("name")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-icon-split" type="submit" >
                                    <span class="icon text-white-50"><i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text"> Edit Category</span>
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
