<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Restaurant</title>
    <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets\frontend\assets\css\login.css') }}">
</head>

<body>
    <section class="main-login">
        <div class="login-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h2>Login</h2>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" @error('email') is-invalid @enderror id="name"
                        value="{{ old('email') }}">
                    <label for="">Email</label>

                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" id="password" @error('password') is-invalid @enderror>
                    <label for="">Password</label>
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="forget">
                    <label class=""><input class="" type="checkbox">Remember me</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none "
                            style="color: black;">Forgot
                            Password</a>
                    @endif
                </div>
                <div class="w-50 mx-auto mt-5">
                    <button class="w-100 btn-light login-btn" type="submit">Login</button>

                </div>
                <div class="register">
                    <p>Dont have an account?<a class="text-decoration-none" href="{{ route('register') }}">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
    <script>
        let name = document.getElementById('name');
        name.addEventListener('focus', function() {
            let sibling = name.nextElementSibling;
            if (sibling && sibling.tagName.toLowerCase() === 'label') {
                let textDangerElement = sibling.nextElementSibling;
                if (textDangerElement && textDangerElement.classList.contains('text-danger')) {
                    textDangerElement.style.display = "none";
                }
            }
        });

        let password = document.getElementById('password');
        password.addEventListener('focus', function() {
            let siblingp = password.nextElementSibling;
            if (siblingp && siblingp.tagName.toLowerCase() === 'label') {
                let textDangerElementp = siblingp.nextElementSibling;
                if (textDangerElementp && textDangerElementp.classList.contains('text-danger')) {
                    textDangerElementp.style.display = "none";
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
