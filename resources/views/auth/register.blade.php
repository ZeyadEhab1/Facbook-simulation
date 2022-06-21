<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('auth/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/vendor/jquery-ui/jquery-ui.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('auth/css/register.css')}}">
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="{{route('register')}}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">

                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-input" name="fname" id="first_name" />
                            </div>
                            @if ($errors->has('fname'))
                            <p>{{ $errors->first('fname') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-input" name="lname" id="last_name" />
                            </div>
                            @if ($errors->has('lname'))
                            <p>{{ $errors->first('lname') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-input" name="email" id="email" required />
                        </div>
                        @if ($errors->has('email'))
                        <p>{{ $errors->first('email') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" class="form-input" name="username" id="email" required />
                        </div>
                        @if ($errors->has('username'))
                        <p>{{ $errors->first('username') }}</p>
                        @endif
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-input" name="password" id="password" required />
                            </div>
                            @if ($errors->has('password'))
                            <p>{{ $errors->first('password') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="re_password">Repeat your password</label>
                                <input type="password" class="form-input" name="password_confirmation"
                                    id="re_password" />
                            </div>
                            @if ($errors->has('password'))
                            <p>{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div id="profile-container">
                            <image id="profileImage" src="{{asset('auth/images/hamada.png')}}" alt="Upload Picture" />
                            @if ($errors->has('image'))
                            <br>
                            <p>{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                        <br>
                        <div><span>Upload Picture Here</span></div>
                        <br>
                        <input id="imageUpload" type="file" name="image" placeholder="Photo" required="" capture>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit" />
                            <br>
                            <span class="txt1">
                                i already have account
                            </span>

                            <a class="txt2" href="{{route('index.login')}}">
                                Login
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('auth/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('auth/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('auth/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('auth/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('auth/js/register.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>