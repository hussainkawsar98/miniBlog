<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/admin')}}/dist/css/adminlte.min.css">
    <!-- Bootstrap Select style -->
    <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/bootstrap-select/bootstrap-select.min.css">
    <!-- Toastr style -->
    <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/toastr/toastr.min.css">
    <!-- SummerNote Style -->
    @yield('summernote-style')
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('public/admin')}}/css/style.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Logout -->
                <li class="nav-item">
                    <a class="nav-link logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link pl-4">
            <i class="fas fa-globe-africa nav-icon pr-1"></i>
            <span class="brand-text font-weight-light font-weight-bold">Visit Website</span>
        </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset(Auth::user()->profile)}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('user.show', Auth()->user()->id)}}" class="d-block {{Request::routeIs('user.show', Auth()->user()->id) ? 'text-info font-weight-bold' : '' }}">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link {{Request::routeIs('admin.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <!-- Start DropDown Menu -->
                        <li class="nav-item">
                            <a href="#" class="nav-link {{Request::routeIs('post.index') || Request::routeIs('post.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Posts
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('post.index')}}" class="nav-link {{Request::routeIs('post.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Posts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('post.create')}}" class="nav-link {{Request::routeIs('post.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Post</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End DropDown Menu -->
                        
                        <!-- Start DropDown Menu -->
                        <li class="nav-item">
                            <a href="#" class="nav-link {{Request::routeIs('category.index') || Request::routeIs('category.create') ? 'active' : '' }}">
                                <i class="nav-icon far fa-file-alt"></i>
                                <p>
                                    Category
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('category.index')}}" class="nav-link {{ Request::routeIs('category.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('category.create')}}" class="nav-link {{ Request::routeIs('category.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End DropDown Menu -->

                        <!-- Start DropDown Menu -->
                        <li class="nav-item">
                            <a href="#" class="nav-link {{Request::routeIs('tag.index') || Request::routeIs('tag.create') ? 'active' : '' }}">
                                <i class="fas fa-tags nav-icon"></i>
                                <p>
                                    Tags
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('tag.index')}}" class="nav-link {{ Request::routeIs('tag.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tags</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('tag.create')}}" class="nav-link {{ Request::routeIs('tag.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Tag</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End DropDown Menu -->

                        <li class="nav-item">
                            <a href="{{route('message.index')}}" class="nav-link {{ Request::routeIs('message.index') ? 'active' : '' }}">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Message
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('comment.index')}}" class="nav-link {{ Request::routeIs('comment.index') ? 'active' : '' }}">
                            <i class="far fa-comments nav-icon"></i>
                                <p>
                                    Comments
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link {{ Request::routeIs('user.index') ? 'active' : '' }}">
                                <i class="far fa-user nav-icon"></i>
                                <p>
                                    My Account
                                </p>
                            </a>
                        </li>
                        <!-- Start Single Menu -->
                        <li class="nav-item">
                            <a href="{{route('setting.index')}}" class="nav-link {{ Request::routeIs('setting.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Setting
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Load Here -->
        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want Contact me <a href="https://www.facebook.com/mhdevss">Muktar Hussain</a>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; {{now()->year}} <a href="https://www.facebook.com/mhdevss">Muktar Hussain</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('public/admin')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('public/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr JS -->
    <script src="{{asset('public/admin')}}/plugins/toastr/toastr.min.js"></script>
    <!-- Custom File JS -->
    <script src="{{asset('public/admin')}}/plugins/bs-custom-file-input.min.js"></script>
    <!-- Bootstrap Select JS -->
    <script src="{{asset('public/admin')}}/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <!-- AdminLTE App -->
    <!-- SummerNote Script -->
    @yield('summernote-script')
    <script src="{{asset('public/admin')}}/dist/js/adminlte.min.js"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @endif

        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
</body>

</html>