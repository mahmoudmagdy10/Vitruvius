<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="{{asset('css/Auth/sign-up.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up</title>
    <link rel="icon" href='{{ url("storage/uploads/image-home/logo.jpeg")}}'>

  </head>

  <body>
    <div class="logo">
        <img src='{{url("storage/uploads/image-home/logo.jpeg")}}'/>
    </div>
    <div class="container">
        <div class="sign-up-form">
            <h1>Sign Up As </h1>
            <div class="signUpAs">
                <div class="active customer">Customer</div>
                <div class="contractor">Constractor</div>
            </div>

            <form class="customer_form" method="POST" action="{{ route('createUser') }}">
                @csrf
                <input type="radio" name="type" value="Customer" checked style="opacity:0">

                <div class="form_container">

                    <div class="contain">
                        <label for="">Full Name</label>
                        <input id="name" class=" form-control " type="text" name="name"  required autofocus autocomplete="name" placeholder="Full Name"/>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Email</label>
                        <input id="email" class=" form-control" type="email" name="email"  required placeholder="your e-mail" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Password</label>
                        <input id="password" class=" form-control" type="password" name="password" required autocomplete="new-password" placeholder="your password"/>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Confirm Password</label>
                        <input id="password_confirmation" class=" form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password" />
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Address</label>
                        <input id="address" class=" form-control" type="text" name="address"  required autofocus autocomplete="address" placeholder=" your address" />
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">National ID</label>
                        <input id="national_id" class=" form-control" type="text" name="national_id"  required autofocus  placeholder="National ID" />
                    </div>

                    <div class="contain">
                        <label for="">Phone</label>
                        <input id="phone" class=" form-control" type="text" name="phone"  required autofocus  placeholder="your Number" />
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="">
                        <input type="submit" class="signup_button " value="Sign Up">
                    </div>
                </div>


            </form>

            <form class="contractor_form" method="POST" action="{{ route('createUser') }}">
                @csrf
                <input type="radio" name="type" value="Contractor" checked style="opacity:0">
                <div class="form_container">
                    <div class="contain">
                        <label for="">Full Name</label>
                        <input id="name" class="input-box form-control " type="text" name="name"  required autofocus autocomplete="name" placeholder="Full Name"/>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Email</label>
                        <input id="email" class="input-box form-control" type="email" name="email"  required placeholder="your e-mail" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Password</label>
                        <input id="password" class="input-box form-control" type="password" name="password" required autocomplete="new-password" placeholder="your password"/>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Confirm Password</label>
                        <input id="password_confirmation" class="input-box form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password" />
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Address</label>
                        <input id="address" class="input-box form-control" type="text" name="address"  required autofocus autocomplete="address" placeholder=" your address" />
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="contain">
                        <label for="">Tax Record</label>
                        <input id="tax_record" class="input-box form-control" type="text" name="tax_record"  required autofocus  placeholder=" Your Tax Record" />
                    </div>

                    <div class="contain">
                        <label for="">Phone</label>
                        <input id="phone" class="input-box form-control" type="text" name="phone"  required autofocus  placeholder="your Number" />
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <input type="submit" class=" signup_button" value="Sign Up">
                    </div
                </div>
            </form>

        </div>

        <div>
            <p>Have An Account ? &emsp; <a href="{{ route('login')}}">Log In</a></p>
        </div>
    </div>

    <script src="{{asset('js/Auth/sign-up.js')}}"></script>
  </body>

</html>
