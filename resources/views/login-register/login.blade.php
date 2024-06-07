<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets\frontend\assets\css\login.css') }}">
    <title>Login | HAMRO PASAL</title>
</head>

<body>
    <section class="main-login">
        <div class="login-container">
            <form action="{{route('login')}}" method="POST">
                <h2>Login</h2>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="forget">
                    <label class=""><input class="" type="checkbox">Remember me</label>
                    <a href="" class="text-decoration-none " style="color: black;">Forgot Password</a>
                </div>
                <div class="w-50 mx-auto mt-5">
                    <button class="w-100 btn-light login-btn" name="login" type="submit">Login</button>

                </div>
                <div class="register">
                    <p>Dont have an account?<a class="text-decoration-none" href="register.html">Register</a></p>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>
