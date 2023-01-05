<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href='{{ url("storage/uploads/image-home/logo.jpeg")}}'>
    <link rel="stylesheet" href="{{asset('css/Auth/login.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="logo">
        <a href=""><img src='{{url("storage/images/logo.jpeg")}}'/></a>
    </div>
    <div class="login">

        <form method="POST" action='{{ url("check_auth") }}' aria-label="{{ __('Login') }}">
            @csrf
            <h3><span style="color:#22477e">Login</span> <span style="color:#105868">Here</span></h3>

            <div>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email or Phone" id="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" id="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input class="submit" type="submit"value="log in">

            <div class="social">
                <div class="go">
                    <div class="sign">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                        <a href="{{url("register")}}">Sign Up</a>
                    </div>
                </div>
                <div class="go">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <a href="">Forget Password ?</a>
                </div>
            </div>
        </form>


    </div>
    <script src="{{asset('js/auth/pro.js')}}"></script>
</body>

</html>
