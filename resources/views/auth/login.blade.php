<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css') }}/app.css">
    <link rel="stylesheet" href="{{ asset('css') }}/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title" style="font-size: 30px;">Login.</h1>
                    <p class="auth-subtitle mb-5" style="font-size: 20px;">Silahkan login menggukan akun anda.</p>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
                            <div class=" form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block shadow-lg mt-5">Login</button>
                    </form>
                    <!-- <div class="text-center mt-5">
                        <p class='text-gray-600'>Don't have an account? <a href="auth-register.html" class='font-bold'>Sign
                                up</a>.</p>
                        <p><a class='font-bold' href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>