@extends('layout.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/Customer/yourProject.css')}}">

@endsection

@section('title')
    Explor
@endsection

@section('content')

<div class="title">
    <div class="container">
        <div class="info">
            <h3>Available Projects</h3>
        </div>
        <div class="projects">
        @isset($contractor)
          @foreach($projects as $project)
            <div data-aos="fade-up" data-aos-delay="150" class="card">
                <div class="box">
                    <div class="det">
                    @if($project->arch === 'Italian')
                        <div class="fram">
                          <iframe title="Petrovsky travel palace in Moscow" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/98620d7a356445e593a1fe71b4e9cf20/embed"> </iframe>
                        </div>
                        @endif
                        @if($project->arch === 'American')
                        <div class="fram">
                          <iframe src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
                        </div>
                        @endif
                        @if($project->arch === 'UK')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/e4869a806dfa4efd9d480fda16990c52/embed"> </iframe>
                        </div>
                        @endif
                        @if($project->arch === 'german')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                        </div>
                        @endif
                        @if($project->arch === 'spanish')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                        </div>
                        @endif
                        <a href="{{route('project_details',$project->id)}}">

                            <ul>
                                <li>Architecture : {{$project->arch}}</li>
                                @foreach($project->props as $prop)
                                <li style="color :#000; font-weight:bold;font-size: 18px;">Predict Price : {{ number_format($prop->PREDICTION) }} $</li>
                                @endforeach
                                <li>Publish at :  {{$project->created_at->format('d-m-Y')}}</li>
                            </ul>

                            @if($project->belong_to_contractor  == null)
                            <a class="btn btn-success accept" href=""> <i class="icon-shopping-cart icon-large"></i> <h4>Accept</h4></a>
                            @endif
                        </a><br>

                    </div>
                </div>
            </div>
            @endforeach
        @endisset
        </div>
        {{-- <div style="width:200px">{!! $project->links() !!}</div> --}}

@endsection
@section('script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 550,
    });

    let btn1 = document.getElementById("btn1");
    window.onscroll = function () {
        if (scrollY >= 200) {
            btn1.style.display = "flex";
        } else {
            btn1.style.display = "none";

        }
    }
    btn1.addEventListener("click", function () {
        scroll({
            top: 0,
            left: 0,
            behavior: "smooth"
        })
    });
</script>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection
