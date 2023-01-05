@extends('layout.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/Customer/yourProject.css')}}">
@endsection

@section('title')
    Your Project
@endsection

@section('content')

<div class="title">
    <div class="container">
        <div class="info">
            <h3>Your project</h3>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="projects">
        @isset($customer)
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
                              src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
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
                        <a href="{{ route('project_details',$project->id) }}">
                            <ul>
                                <li>Architecture Style: {{$project->arch}}</li>

                                @foreach($project->props as $prop)
                                <li style="color :#000; font-weight:bold">Predict Price : {{ number_format($prop->PREDICTION) }} $</li>
                                @endforeach
                                <li>Published At : {{$project->created_at->format('d-m-Y')}}</li><br>
                            </ul>
                        </a><br>
                        <div class="card_buttons">
                            @if($project->payment_status == 0)
                            <a href="" class=" btn btn-success" style="background-color:green; font-weight:bold; color:white"><h3>Pay</h3></a><br>
                            @endif
                            @if($project->payment_status != 0)
                            <a href="" class=" btn btn-secondary" style="background-color:grey; font-weight:bold; color:white"><h3>Paied</h3></a><br>
                            @endif

                            <a href="{{ route('delete_project',$project->id) }}" onclick='return confirm("Are you sure?")' class=" btn btn-danger delete-confirm" style="font-weight:bold; color:white"><h3>Delete</h3></a><br>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endisset
        </div>

    </div>
</div>
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

@endsection

