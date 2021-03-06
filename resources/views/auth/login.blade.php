<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-signin-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 May 2021 11:56:41 GMT -->
<head>
    <title>Datta Able - Signin</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="https://codedthemes.com/demos/admin-templates/datta-able/bootstrap/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/dark.css') }}">

</head>

<body>
    <div class="auth-wrapper aut-bg-img" style="background-image: url('{{ asset('assets/images/bg-images/bg3.jpg') }}');">
        <div class="auth-content">
            <div class="text-white">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="mb-4 text-white">Login</h3>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}"  name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
{{--                        <div class="form-group text-left">--}}
{{--                            <div class="checkbox checkbox-fill d-inline">--}}
{{--                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" >--}}
{{--                                <label for="checkbox-fill-a1" class="cr"> Save credentials</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
                    </form>
{{--                    <p class="mb-2 text-muted">Forgot password? <a class="text-white" href="auth-reset-password-v3.html">Reset</a></p>--}}
{{--                    <p class="mb-0 text-muted">Don???t have an account? <a class="text-white" href="auth-signup-v3.html">Signup</a></p>--}}
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script><script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>

</body>

<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-signin-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 May 2021 11:56:41 GMT -->
</html>
