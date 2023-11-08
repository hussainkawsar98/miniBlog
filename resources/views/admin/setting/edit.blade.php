@extends('layouts.admin')
@section('title', 'Edit Setting | Develop by Muktar Hussain')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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
                                <h3 class="card-title pt-2">Website Setting</h3>
                                <a href="{{route('setting.index')}}" class="btn btn-primary">Go Back Setting Page</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-primary">
                                <!-- Errors List Show -->
                                @include('layouts.errors')
                                <form action="{{route('setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="card-body">
                                        <h5 class="mt-3 bg-light p-3">Site Logo</h5>
                                        <div class="form-group">
                                            <label>Website Header Logo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" value="{{ old('site_logo') }}"
                                                    id="hLogo" name="site_logo">
                                                <label class="custom-file-label" for="image">Choose Your Logo</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Website Footer Logo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" value="{{ old('footer_logo') }}"
                                                    name="footer_logo">
                                                <label class="custom-file-label" id="hLogo" for="image">Choose Footer
                                                    Logo</label>
                                            </div>
                                        </div>
                                        <h5 class="mt-3 bg-light p-3">Footer About</h5>
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input type="text" class="form-control" value="{{$setting->site_title}}" name="site_title">
                                        </div>
                                        <div class="form-group">
                                            <label>About Description</label>
                                            <textarea name="footer_des" class="form-control" cols="30"
                                                rows="4">{{$setting->footer_des}}</textarea>
                                        </div>
                                        <h5 class="mt-3 bg-light p-3">Social Link</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Facebook Link</label>
                                                    <input type="text" class="form-control" value="{{$setting->facebook}}" name="facebook">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Instagram Link</label>
                                                    <input type="text" class="form-control" value="{{$setting->instagram}}" name="instagram">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Twitter Link</label>
                                                    <input type="text" class="form-control" value="{{$setting->twitter}}" name="twitter">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>LinkenIn Link</label>
                                                    <input type="text" class="form-control" value="{{$setting->linkedin}}" name="linkedin">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Youtube Link</label>
                                                    <input type="text" class="form-control" value="{{$setting->youtube}}" name="youtube">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pinterest Link</label>
                                                    <input type="text" class="form-control" value="{{$setting->pinterest}}" name="pinterest">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" value="{{$setting->address}}" name="address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" value="{{$setting->phone}}" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" value="{{$setting->email}}" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="mt-3 bg-light p-3">Copy Right</h5>
                                        <div class="form-group">
                                            <label>Copy Right</label>
                                            <input type="text" class="form-control" value="{{$setting->copy_right}}" name="copy_right">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Setting</button>
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