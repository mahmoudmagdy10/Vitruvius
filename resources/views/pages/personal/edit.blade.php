@extends('layout.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/Profile/edit.css')}}">

@endsection

@section('title')
    Edit
@endsection

@section('content')
<div class="form-container">
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

    <form class="form-2" action="{{route('user.updateUserData')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($user)
        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <input class="col-sm-6 form-control" name="name" value = "{{$user->name}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <input class="col-sm-6 form-control"  value = "{{$user->email}}" readOnly>
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
            </div>
            <input class="col-sm-9 form-control" name="phone" value = "{{$user->phone}}">
        </div>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
            </div>

            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-globe" aria-hidden="true"></i></span>
            </div>

            <input class="col-sm-9 form-control" name="address" value = "{{$user->address}}">
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">National ID</h6>
            </div>
            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
            </div>
            <input class="col-sm-9 form-control" name="national_id" value = "{{$user->national_id}}" require>
        </div>
        @error('national_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="form-actions">
            <button type="button" class="btn btn-warning mr-1"
                    onclick="history.back();">
                <i class="ft-x"></i> Back
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> Update
            </button>
        </div>
        @endisset
    </form>

    <form class="form-2" action="{{route('user.updateUserPassword')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($user)

        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Old Password</h6>
            </div>
            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
            </div>
            <input class="col-sm-9 form-control" name="old_password" type="" autocomplete="new-password" placeholder="Type Old Password" >
        </div>
        @error('old_password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Current Password</h6>
            </div>
            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
            </div>
            <input class="col-sm-9 form-control" name="current_password" type="" autocomplete="new-password" placeholder="Type New Password" >
        </div>
        @error('current_password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="input-group mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Current Password</h6>
            </div>
            <div class="input-group-prepend ">
                <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
            </div>
            <input class="col-sm-9 form-control" name="confirm_current_password" type="" autocomplete="new-password" placeholder="Confirm New Password" >
        </div>
        @error('confirm_current_password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <div class="form-actions">
            <button type="button" class="btn btn-warning mr-1"
                    onclick="history.back();">
                <i class="ft-x"></i> Back
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> Update
            </button>
        </div>
        @endisset
    </form>
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
