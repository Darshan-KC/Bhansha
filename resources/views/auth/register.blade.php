<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register | Restaurant</title>
    <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets\frontend\assets\css\login.css') }}">
</head>

<body>
    <section class="main-register">
        <div class="login-container ">
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <h2>Register</h2>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="name" id="name">
                    <label for="">Name</label>
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" id="email">
                    <label for="">Email</label>
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-home"></i></span>
                    <input type="text" name="address" id="address">
                    <label for="">Address</label>
                    @error('address')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-phone"></i></span>
                    <input type="text" name="number" id="number">
                    <label for="">Phone</label>
                    @error('number')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" autocomplete="new-password" id="password">
                    <label for="">Password</label>
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password_confirmation" autocomplete="new-password">
                    <label for="">Confirm Password</label>
                    @error('password_confirmation')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="w-50 mx-auto my-3">
                    <button class="w-100 btn-light login-btn" type="submit">Register</button>
                </div>
                <div class="register">
                    <p>Already an account?<a class="text-decoration-none" href="{{ route('login') }}">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
    <script>
        let name = document.getElementById('name');
        name.addEventListener('focus',function(){
            hide(name);
        });
        let email = document.getElementById('email');
        email.addEventListener('focus',function(){
            hide(email);
        });
        let address = document.getElementById('address');
        address.addEventListener('focus',function(){
            hide(address);
        });
        let number = document.getElementById('number');
        number.addEventListener('focus',function(){
            hide(number);
        });
        let password = document.getElementById('password');
        password.addEventListener('focus',function(){
            hide(password);
        });

        function hide(name) {
            let sibling = name.nextElementSibling;
            if (sibling && sibling.tagName.toLowerCase() === 'label') {
                let textDangerElement = sibling.nextElementSibling;
                if (textDangerElement && textDangerElement.classList.contains('text-danger')) {
                    textDangerElement.style.display = "none";
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
