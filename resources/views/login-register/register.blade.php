<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register | HAMRO PASAL</title>
    <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset('assets\frontend\assets\css\login.css') }}">
</head>

<body>
    <section class="main-register">
        <div class="login-container ">
            <form action="#" method="POST">

                <h2>Register</h2>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="name" required>
                    <label for="">Name</label>
                </div>
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
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="cpassword" required>
                    <label for="">Confirm Password</label>
                </div>

                <div class="w-50 mx-auto my-3">
                    <button class="w-100 btn-light login-btn" name="register" type="submit">Register</button>

                </div>

            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
