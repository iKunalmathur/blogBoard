<!DOCTYPE html>
<html style="background-color: #4285f4;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BlogBoard</title>
    <link rel="icon" type="icon" href="assets/img/favicon-blogboard.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-color: #4285f4;">
    <div class="login-clean" style="background-color: #4285f4;">
        {{-- <form method="post" style="height: 490px;"> --}}
            <form method="POST" action="{{ route('login') }}" style="height: 490px">
            @csrf
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img class="img-fluid" style="color: #db4437;" src="assets/img/DEVSOLO_NEW_ICON_2020-05-05-RYG.png"></div>
            <div class="form-group">
                {{-- <input class="border rounded form-control" type="email" name="email" placeholder="Email"> --}}
                <input id="email" type="email" class="border rounded form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{-- <input class="border rounded form-control" type="password" name="password" placeholder="Password"> --}}
                <input id="password" type="password" class="border rounded form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block border rounded" type="submit" style="background-color: #343a40;">Log In</button></div>
        </form>
    </div>
    <p class="text-right" style="color: #ffffff;margin-right: 20px;">© Copyright 2020 <a href="https://devsolo.tech/" target="blank" style="color: #ffffff;">Devsolo </a>- All Rights Reserved<br /></p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
