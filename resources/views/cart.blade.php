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
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <div class="pubble-app" data-app-id="120327" data-app-identifier="120327"></div>
    <script type="text/javascript" src="https://cdn.chatify.com/javascript/loader.js" defer></script>
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
                        <a href="{{url('/')}}" class="logo">
                            <img src="assets/images/log.jpg" style="height:60px;width:195px">
                        </a>
                        <ul class="nav">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            @if(Auth::check())
                            <li><a href="{{url('#')}}">Cart</a></li>
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
    <div class="page-heading" id="top"></div>
    <div class="container-fluid px-5">
        <div class="row my-5">
            <div class="col col-8">
                @php
                    $totalPrice = 0; 
                @endphp
                @foreach($orders as $order)
                <div class="d-flex justify-content-around align-items-center my-3">
                    <div>
                        <img src="{{ $order->product_image }}" alt="{{ $order->product_name }}" style="width: 6rem; height: 6rem; border-radius: 0.7rem;">
                    </div>
                    <div>
                        <p>{{ $order->product_name }}</p>
                    </div>
                    <div>
                        <p>{{ $order->product_price }} $</p>
                        @php
                            $totalPrice += $order->product_price;
                        @endphp
                    </div>
                    <div>
                        <a href="{{ route('orders.delete', $order->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col col-4">
                <h3 class="fw-light text-center" style="font-family: 'Poiret One', cursive;">Order Amount</h3>
                <div class="p-3 my-3" style="border: 1px solid lightgray">
                    <p class="fw-bold">Delivery:</p>
                    <div class="d-flex">
                        <input type="checkbox" class="mx-2" name="delivery" id="">
                        <label for="">Home Delivery</label>
                    </div>
                    <div class="d-flex">
                        <input type="checkbox" name="pickup" class="mx-2" id="">
                        <label for="">Pick up</label>
                    </div>
                </div>
                <div class="p-3 my-3" style="border: 1px solid lightgray">
                    <div class="d-flex">
                        <p class="fw-bold mx-2">Sub-total:</p>
                    </div>
                    <div class="d-flex">
                        <p class="fw-bold mx-2">Vat (20$):</p>
                        <p>21.67 $</p>
                    </div>
                </div>
                <div class="p-3 my-3" style="border: 1px solid lightgray">
                    <input type="text" name="" placeholder="Promo Code" id="" style="outline: none; border:none;">
                </div>
                <div class="p-3 my-3" style="border: 1px solid lightgray">
                    <div class="d-flex">
                        <p class="fw-bold mx-2" style="margin-block-start: 0; margin-block-end:0;">Total: {{ $totalPrice + 21.67 }} $</p>
                    </div>
                </div>
                @if (count($orders)!=0)
                    <form action="{{ route('orders.deleteall') }}" method="POST">
                        @csrf
                        <!-- $totalPrice = 0; -->
                        <button type="submit" class="btn btn-success w-100" style="background: #3c6450">Checkout</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

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
</body>
</html>