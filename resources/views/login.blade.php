<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tutorial Login Laravel</title>
        <!-- font -->
        <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body{
                font-family: "Poppins", sans-serif;
                font-weight: 200;
                font-style: normal;
            }
        </style>
    </head>

    <body>
        <!-- <div class="container"><br>
            <div class="col-md-4 col-md-offset-4">
                <h2 class="text-center">Tutorial Login Laravel</h2>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('loginaksi') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nip</label>
                        <input type="text" name="nip" class="form-control" placeholder="Nip" required="">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Log In</button>

                    <hr>
                    <p class="text-center">Belum punya akun? <a href="#">Register</a> sekarang!</p>
                </form>
            </div>
        </div> -->

        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif
                <div class="card-header">Login</div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('loginaksi') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">Nip</label>
                            <div class="col-md-6">
                                <input id="nip" type="nip" class="form-control" name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus placeholder="Masukkan nip">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="masukkan password">
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0 pt-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                        
                        <!-- <p class="text-center mt-4">Belum punya akun? <a href="#">Register</a> sekarang!</p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</html>