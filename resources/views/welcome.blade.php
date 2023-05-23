<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Shopping Store</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <div class="pubble-app" data-app-id="120327" data-app-identifier="120327"></div>
    <script type="text/javascript" src="https://cdn.chatify.com/javascript/loader.js" defer></script>
    <style>
        .product-detail {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 2.4em; 
            line-height: 1.2em;
        }
        .product-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="" class="logo">
                            <img src="assets/images/log.jpg" style="height:60px;width:195px">
                        </a>
                        <ul class="nav">
                            <li><a href="#top" class="active">Home</a></li>
                            @if(Auth::check())
                            <li><a href="{{url('/cart')}}">Cart</a></li>
                            @endif
                            <li><a href="{{url('/about')}}">About Us</a></li>
                            <li><a href="{{url('/contactus')}}">Contact Us</a></li>

                            @if(Auth::check())
                                <li class="submenu">
                                    <a href="javascript:;">{{ Auth::user()->name }}</a>
                                    <ul>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="submenu">
                                    <a href="javascript:;">Account</a>
                                    <ul>
                                        <li><a href="{{url('/login')}}">Login</a></li>
                                        <li><a href="{{url('/register')}}">Register</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="section" id="explore">
        <div class="main-banner" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content">
                            <h2>Explore Our Products</h2>
                            <span>Right product with reasonable price  keeps shopping from us</span>
                            <div class="quote">
                                <i class="fa fa-quote-left"></i>
                                <p>Let your brand personality shine through. ...</p>
                            </div>
                            <p>Show love for our page we value our customers.</p>
                            <p>Decent with discount  do shopping from our shopping page.</p>
                            <div class="main-border-button">
                                <a href="#men">Discover More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="leather">
                                        <h4>Leather Bags</h4>
                                        <span>Latest Collection</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="first-image">
                                        <img src="assets/images/explore-image-01.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="second-image">
                                        <img src="assets/images/instagram-06.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="types">
                                        <h4>Different Types</h4>
                                        <span>Over 304 Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Men's Latest</h2>
                        <span>We are a premier online destination for fashion-forward men's clothing. Our store offers a carefully curated collection of high-quality garments and accessories that cater to the modern man's sense of style.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @foreach($menProducts as $product)
                                <div class="item">
                                    <div class="thumb">
                                    <div class="hover-content">
                                        @if(Auth::check())
                                        <ul class="list-unstyled text-center">
                                            <li>
                                                <form method="POST" action="{{ route('orders.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                                    <input type="hidden" name="product_image" value="{{ asset('image/'.$product->image) }}">
                                                    <button type="submit" class="btn btn-light rounded-circle">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                        @endif
                                    </div>
                                        <img src="{{ asset('image/'.$product->image) }}" alt="" width="400" height="400">
                                    </div>
                                    <div class="down-content">
                                        <h4 class="product-name">{{$product->name}}</h4>
                                        <span>${{$product->price}}</span>
                                        <span class="product-detail">{{$product->detail}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Women's Latest</h2>
                        <span>We are an exclusive online destination for stylish and sophisticated women's clothing. Our store offers a carefully curated collection of fashionable apparel and accessories that cater to the modern woman's tastes and preferences.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            @foreach($womenProducts as $product)
                            <div class="item">
                                <div class="thumb">
                                <div class="hover-content">
                                        @if(Auth::check())
                                        <ul class="list-unstyled text-center">
                                            <li>
                                                <form method="POST" action="{{ route('orders.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                                    <input type="hidden" name="product_image" value="{{ asset('image/'.$product->image) }}">
                                                    <button type="submit" class="btn btn-light rounded-circle">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                        @endif
                                    </div>
                                    <img src="{{ asset('image/'.$product->image) }}" alt="" width="400" height="400">
                                </div>
                                <div class="down-content">
                                    <h4 class="product-name">{{$product->name}}</h4>
                                    <span>${{$product->price}}</span>
                                    <span class="product-detail">{{$product->detail}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Women Area Ends ***** -->

    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Kid's Latest</h2>
                        <span> We are your one-stop online destination for trendy and high-quality clothing for children. We offer a wide range of stylish and comfortable clothes for kids of all ages, from infants to pre-teens.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            @foreach($kidsProducts as $product)
                            <div class="item">
                                <div class="thumb">
                                <div class="hover-content">
                                    @if(Auth::check())
                                    <ul class="list-unstyled text-center">
                                            <li>
                                                <form method="POST" action="{{ route('orders.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                                    <input type="hidden" name="product_image" value="{{ asset('image/'.$product->image) }}">
                                                    <button type="submit" class="btn btn-light rounded-circle">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                                    <img src="{{ asset('image/'.$product->image) }}" alt="" width="400" height="400">
                                </div>
                                <div class="down-content">
                                    <h4 class="product-name">{{$product->name}}</h4>
                                    <span>${{$product->price}}</span>
                                    <span class="product-detail">{{$product->detail}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Kids Area Ends ***** -->
    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Social Media</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-03.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-04.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-05.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-06.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @component('components.footer')
    @endcomponent

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".product-detail").each(function() {
                var maxHeight = parseFloat($(this).css("max-height"));
                var lineHeight = parseFloat($(this).css("line-height"));
                var textHeight = parseFloat($(this).css("height"));
                
                if (textHeight > maxHeight) {
                var lines = Math.floor(maxHeight / lineHeight);
                $(this).css("-webkit-line-clamp", lines);
                $(this).css("max-height", (lineHeight * lines) + "px");
                }
            });
        });
    </script>
</body>
</html>