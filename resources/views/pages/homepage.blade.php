@extends('layout.app')

@section('link')
    <link rel="stylesheet" href="{{asset('css/Homepage/darkmode.css')}}">
@endsection

@section('title')
    Home
@endsection

@section('content')
    <!-- start landing  -->
    <div class="home" id="home" style=" background-color: rgb(80,80,80);">
      <div data-aos="zoom-in" data-aos-delay="50" class="container">
        <input name="user_id" type="hidden" value="">
        <div class="content">
        </div>
        <div class="details">
          <h1 id="text">
          </h1>
        </div>
      </div>
    </div>
    <!-- start section  -->
    <div class="section" id="section">
      <div class="container">
        <div class="text">
          <div class="content-image">
            <img data-aos="fade-up" data-aos.delay="100" src='{{ url("storage/images/undraw_building_re_xfcm.svg") }} ' alt="">
          </div>
          <div data-aos="fade-up" data-aos.delay="150" class="con-text">
            <h1>Welcome To <span class="man"> Vitruvius</span></h1>
            <p>We are facilitating the creation of your Project from scratch to finish.<br>
                Follow The Road Map
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- end section  -->
    <!-- start road map -->
    <div class="road-map">
      <div class="main-title" data-aos="fade-up" data-aos.delay="200">
        <h1>road map</h1>
      </div>
      <div class="container" data-aos="fade-up" data-aos.delay="250">
        <h1 class="heading">Customer Road Map</h1>
        <div class="cont-map">
          <div class="right">
            <h2>Upload Your Building</h2>
            <p>Choose Your Architecture Style or Upload Your 3D Style File<br>
                Upload Your 2D Style File<br>
                Go To Our Model To get Your CSV File<br>
                Upload CSV File

            </p>
          </div>
          <div class="clear"></div>
          <div class="left">
          <h2>Publish </h2>
            <p>If You Agree To The Predict Price Save your Project To Get Contractors' Offers</p>
          </div>
          <div class="clear"></div>
          <div class="right">
            <h2>Complete Your Building's Payment</h2>
          </div>
          <div class="clear"></div>
          <div class="left">
            <h2>Comments</h2>
            <p>Communicate With Contractors And Get Offer</p>
          </div>

          <div class="clear"></div>
          <div class="right">
            <h2>Contract</h2>
            <p>Get Good Offer And Sign Contract.</p>
          </div>
          <div class="clear"></div>
          <div class="clear"></div>

        </div>
      </div>
      <br>
      <br>
      <div class="container" data-aos="fade-up" data-aos.delay="300">
        <h1 class="heading">Contractor Road Map</h1>

        <div class="cont-map">
          <div class="right">
            <h2>Select Project</h2>
            <p>Explor And Choose Project Suitable With You </p>
          </div>
          <div class="clear"></div>
          <div class="left">
            <h2>Make Offer</h2>
            <p>Communicate With Customer Make Offer</p>
          </div>

          <div class="clear"></div>
          <div class="right">
            <h2>Complete Your Building's Payment</h2>
          </div>

          <div class="clear"></div>
          <div class="left">
          <h2>Contract</h2>
            <p>Get Good Offer And Sign Contract.</p>
          </div>
          <div class="clear"></div>


        </div>
      </div>
    </div>
    <!-- end road map -->

    <!-- start footer  -->

    <div class="footer">
      <div class="container">
        <div class="box-1">
            <img src='{{url("storage/images/logo.jpeg")}}' alt="">
            <p>This site specializes in construction. It's available to carry out any project for our clients whether by
                sending 3D/2D models of private projects or choosing from our site. Moreover, our clients can send us models
                to calculate the costs for them.</p>
        </div>
        <br>
        <div class="box-2">
          <h2>Permalinks</h2>
          <ul class="navigation">
            <li><a href="">about us</a></li>
            <li><a href="{{route('login')}}" target=_blank>Sign In</a></li>
            <li><a href="{{route('register')}}" target=_blank>Sign Up</a></li>
          </ul>
        </div>
      </div>
    </div>

<!-- end footer-->
@endsection

@section('script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src=" {{asset('js/Homepage/homepage.js')}}"></script>
<script src="{{asset('js//Homepage/landing.js')}}"></script>
<script src=" {{asset('js//Homepage/home.js')}}"></script>


@endsection
