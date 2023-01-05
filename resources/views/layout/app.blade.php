<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>@yield('title')</title>
        @yield('link')
        <link rel="icon" href='{{ url("storage/images/logo.jpeg")}}'>
        <link rel="stylesheet" href="{{asset('css/Homepage/home.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?display=swap&amp;family=Libre+Baskerville:400,700|Nunito:300,400,700" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap"rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

        <style>
            .swiper-slide{
                width:400px;
            }

        </style>
    </head>
    <body>
        <!-- start header  -->
        <header id="header">
            <div class="logo">
            <a href="{{ route('homepage')}}"><img src='{{ url("storage/images/logo.jpeg")}}'/></a>
            </div>

            <x-notification></x-notification>

            <ul class="navigation">
                <li><a class="accept" href="{{ route('homepage')}}" value = "Home">Home</a></li>

                @if(Auth::user()->type == 'Customer')
                <li><a href="{{ route('upload')}}" value ="Upload">Upload</a></li>
                @endif

                @if(Auth::user()->type == 'Contractor')
                <li><a href="{{ route('explore')}}" value = "Explore">Explore</a></li>
                @endif

                <li><a href="{{route('show_project')}}" value = "Your Project">Your Project</a></li>
                <li><a href="" value = "Payment">Payment</a></li>
                <li class="icon_profile">
                    <x-profilenav class=" rounded-circle shadow-1-strong me-3" width="40" height="40"></x-profilenav>
                </li>
                <li>
                    <div class="arrow-up"></div>
                    <div class ="pop_up">
                        <a href="" value = "Your Projects">Your Projects</a>
                        <a href="{{ route('user.showProfilePage') }}" value = "Profile">Profile</a>
                        <a href="{{url('logout')}}">Log Out</a>
                    </div>
                </li>
                <li>
                    <div class="arrow-up"></div>
                    <div class ="pop_up">
                        <a href="" value = "Your Projects">Your Projects</a>
                        <hr>
                        <a href="" value = "Profile">Profile</a>
                        <hr>
                        <a href="">Log Out</a>
                    </div>
                </li>


            </ul>
            <div class="bars" data-aos="zoom-in" data-aos.delay="50">
                <i id="bar" class="fas fa-bars"></i>
            </div>

            <div class="mode" data-aos="zoom-in" data-aos.delay="50">
                <i src='{{ url("storage/icons/moon-solid.svg")}}' id="check" onclick="changeStatus()" class="fa-solid fa-moon"></i>
                {{-- <img id="check" onclick="changeStatus()" src='{{ url("storage/icons/moon-solid.svg")}}'/> --}}
            </div>

        </header>
    <!-- end header  -->
        <main>
            <button id="btn1">
                <i class="fas fa-angle-double-up"></i>
            </button>

            @yield('content')
            @yield('scrollTop')

        </main>
        @yield('script')
        <script src=" {{asset('js/app/header.js')}}"></script>
        <script src=" {{asset('js/app/app.js')}}"></script>
        <script src=" {{asset('js/app/edit.js')}}"></script>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Pusher script  -->
        <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
        {{-- ------------------------------------- --}}
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script>
            AOS.init({
                duration: 800,
        });
        </script>
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                autoplay: true,
                speed: 800,
                breakpoints: {
                // when window width is >= 320px
                576: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                // when window width is >= 640px
                991: {

                    slidesPerView: 3,
                    spaceBetween: 20
                },
                }
                ,
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
            });
        </script>

    </body>
</html>
