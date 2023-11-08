<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/website')}}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('public/website')}}/css/aos.css">
    <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{asset('public/website')}}/css/style.css">
</head>

<body>
    <!-- Start Navbar  -->
    <div class="site-wrap">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                <a class="navbar-brand" href="{{route('home')}}">Mini Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu">
                                @foreach($categories as $category)
                                <a href="{{route('category', $category->slug)}}"
                                    class="dropdown-item">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            

                            <!-- Button trigger modal -->
                            <i data-target="#exampleModal" class="fas fa-search search-icon" data-toggle="modal"></i>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body">
                                    <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search')}}">
                                        <h5>Search Anything</h5>
                                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search">
                                        <button class="btn my-2 my-sm-0" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

                        </li>
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                </div>
            </nav>
        </div>
        <!-- End Navbar  -->

        <!-- Page Content Load Here -->
        @yield('content')

        <div class="site-footer">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <h3 class="footer-heading mb-4">{{$setting->site_title}}</h3>
                        <p>{{$setting->footer_des}}</p>
                    </div>
                    <div class="col-md-2 ml-auto">
                        <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                        <ul class="list-unstyled float-left mr-5">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled float-left">
                            @foreach($categories as $category)
                            <li><a href="{{route('category', $category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h3 class="footer-heading mb-4">Connect With Us</h3>
                            <p>
                                <a href="{{$setting->facebook}}"><span
                                        class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="{{$setting->twitter}}"><span class="icon-twitter p-2"></span></a>
                                <a href="{{$setting->instagram}}"><span class="icon-instagram p-2"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid footer-bootom">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="m-0 py-4">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            {{$setting->copy_right}}<a href="https://colorlib.com" target="_blank"> Muktar Hussain</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{asset('public/website')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('public/website')}}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{asset('public/website')}}/js/jquery-ui.js"></script>
    <script src="{{asset('public/website')}}/js/popper.min.js"></script>
    <script src="{{asset('public/website')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('public/website')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('public/website')}}/js/jquery.stellar.min.js"></script>
    <script src="{{asset('public/website')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('public/website')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('public/website')}}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('public/website')}}/js/aos.js"></script>

    <script src="js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>