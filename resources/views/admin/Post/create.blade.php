@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post List</a></li>
                        <li class="breadcrumb-item active">Add Post</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title pt-2">Create Post</h3>
                                    <a href="{{route('post.index')}}" class="btn btn-primary">Go Back Post List</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-primary">
                                    <!-- Errors List Show -->
                                    @include('layouts.errors')
                                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Post Title</label>
                                                <input type="text" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter Title" name="title">
                                            </div>

                                            <div class="form-group">
                                                <label>Post Category</label>
                                                <select name="category_id" value="{{ old('category_id') }}" id="" class="form-control">
                                                    <option selected disabled>Select Post Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" id="summernote" cols="30" class="form-control" rows="4" placeholder="Description">{{ old('description')}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Select Tags</label>
                                                @foreach($tags as $tag)
                                                <div class="form-check">
                                                    <input class="form-check-input" value="{{$tag->id}}" name="tags[]" type="checkbox" id="tag{{$tag->id}}">
                                                    <label class="form-check-label" for="tag{{$tag->id}}">{{$tag->tag}}</label>
                                                </div>
                                                @endforeach
                                                <div class="form-group">

                                            </div>

                                            <div class="form-group">
                                                <label>Post Feature Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" value="{{ old('image') }}" name="image" id="image">
                                                    <label class="custom-file-label" for="image">Choose Feature Image</label>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Save Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection

@section('summernote-style')
<!-- <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/bootstrap v-3.4.1.min.css"> -->
<link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/summernote.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('summernote-script')
<!-- <script src="{{asset('public/admin')}}/plugins/summernote/bootstrap v-3.4.1.min.js"></script> -->
<script src="{{asset('public/admin')}}/plugins/summernote/summernote.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Write Your Post..',
        tabsize: 2,
        minHeight: 250
    });
</script>
@endsection