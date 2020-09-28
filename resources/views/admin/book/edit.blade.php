@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">  Edit Book </h6> <br>
                </div>
            </div>
            <div class="box-body">
                @include('admin.include.alerts.errors')
                @include('admin.include.alerts.success')
                <div class="card-body">
                    <form action="{{route('book.update',$books->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{$books->id}}"> {{-- عشان الصوره لو محبتش اغيرها --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Photo </label>
                                <input class="form-control" type="file" name="photo" value="{{$books->photo}}">
                                @error("photo")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Name Of Book </label>
                                <input class="form-control" type="text" name="name" value="{{$books->name}}">
                                @error("name")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Title Of Book </label>
                                <input class="form-control" type="text" name="title" value="{{$books->title}}">
                                @error("title")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Description Of Book </label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$books->description}}</textarea>
                                @error("description")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" value="1" class="form-check-input" id="materialIndeterminate2" name="found" @if($books->found==1)
                                    checked @endif>
                                    <label class="form-check-label" for="materialIndeterminate2">Status</label>
                                </div>
                                @error("found")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Select Of Category </label>
                                <select class="form-control" name="category_id">
                                    <optgroup label="Please choose Category To search"></optgroup>
                                    <option class="hidden">-----</option>
                                    @inject('categories','App\Models\Category')
                                    @foreach($categories->all() as $category)
                                        <option value="{{$category->id}}" @if($category->id == $books->category_id ) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error("category_id")
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-icon-split" type="submit" >
                                    <span class="icon text-white-50"><i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text"> Add Book</span>
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
