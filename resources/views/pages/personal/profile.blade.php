@extends('layout.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/Profile/profile.css')}}">

@endsection

@section('title')
    Profile
@endsection


@section('content')
<div class="profile_container">
    <div class="main-body prof">
        <form action="{{route('user.updateProfilePicture')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="parent">
                <div class="img-person">
                    <x-profilenav class="profile_picture" width=0 height=0></x-profilenav>

                    <div class="caption">
                        <input type="file" class="form-control btn-success"  name="photo" aria-label="Select Profile Picture" >
                        <input type="submit" class="form-control save_profile" value="Save" >
                    </div>
                </div>
                </div>
            </div>
        </form>

        <div class="profile_info">
            @isset($user)
            <div class="row-container">
                <div class="prop">
                <h4 class="">Full Name</h4>
                </div>

                <div class="value">
                {{$user->name}}
                </div>
            </div>
            <hr>

            <div class="row-container">
                <div class="prop">
                <h4 class="">Email </h4>
                </div>

                <div class="value" readOnly>
                {{$user->email}}
                </div>
            </div>
            <hr>
            <div class="row-container">
                <div class="prop">
                <h4 class="">Address</h4>
                </div>

                <div class="value">
                {{$user->address}}
                </div>
            </div>
            <hr>
            @if(Auth::user()->type == 'Customer')
            <div class="row-container">
                <div class="prop">
                <h4 class="">National ID</h4>
                </div>
                <div class="value">
                {{$user->national_id}}
                </div>
            </div>
            @endif
            @if(Auth::user()->type == 'Contractor')
            <div class="row-container">
                <div class="prop">
                <h4 class="">Tax Record</h4>
                </div>
                <div class="value">
                {{$user->tax_record}}
                </div>
            </div>
            @endif
            <hr>
            <div class="row-container">
                <div class="prop">
                <h4 class="">Phone</h4>
                </div>

                <div class="value">
                {{$user->phone}}
                </div>
            </div>
            <hr>

            <div class=" form-actions">
                <a class="btn btn-danger " href="{{route('user.editProfilePage')}}">Edit</a>
            </div>
            @endisset
        </div>
    </div>
</div>
@endsection

@section('script')

<script>

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
