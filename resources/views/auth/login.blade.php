<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('images/lotus.webp') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3 mb-3">
                    <!-- <div class="card-header text-center">
                        <h4>Login</h4>
                    </div> -->
                    <div class="card-body">
                        <!-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->

                        <section class="h-100 gradient-form" style="background-color: #eee;">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-xl-10">
                                        <div class="card rounded-3 text-black">
                                            <div class="row g-0">
                                                <div class="col-lg-6">
                                                    <div class="card-body p-md-5 mx-md-4">

                                                        <div class="text-center">
                                                            <img src="{{ asset('images/lotus.webp') }}" style="width: 185px;" alt="logo">
                                                            <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                                                        </div>

                                                        <form action="{{ route('login') }}" method="POST">
                                                            @csrf
                                                            <p>Please login to your account</p>

                                                            <!-- <div data-mdb-input-init class="form-outline mb-2">

                                                                <label for="user_type">Select Role:</label><br>
                                                                <input type="radio" id="admin" name="user_type" value="1">
                                                                <label for="admin">Admin</label><br>
                                                                <input type="radio" id="user" name="user_type" value="0" checked>
                                                                <label for="user">User</label>
                                                            
                                                                @error('user_type')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div> -->

                                                            <div data-mdb-input-init class="form-outline mb-2">
                                                                <label class="form-label" for="form2Example11">Email</label>
                                                                <input type="email" name="email" id="form2Example11" class="form-control" placeholder="Email address" value="{{ old('email') }}" />
                                                                @error('email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div data-mdb-input-init class="form-outline mb-2">
                                                                <label class="form-label" for="form2Example22">Password</label>
                                                                <input type="password" name="password" value="{{ old('password') }}" id="form2Example22" class="form-control" placeholder="Password" />
                                                                @error('password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <!-- This captcha code is Image captcha code is randomply generated -->
                                                            <div data-mdb-input-init class="form-outline mb-4">
                                                                <div class="mb-3">
                                                                    <img src="{{ url('/captcha') }}" alt="CAPTCHA Image" id="captcha-image" style="width:60%">
                                                                    <a href="#" onclick="document.getElementById('captcha-image').src='{{ url('/captcha') }}?'+Math.random();">
                                                                        <i class="fas fa-sync-alt"></i>
                                                                    </a>
                                                                    <input type="text" class="form-control mt-2" name="captcha" placeholder="Enter the CAPTCHA">
                                                                    @error('captcha')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <!-- This captcha code is for "I'am not a robot" -->
                                                            <!-- <div class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}"></div> -->

                                                            <div class="text-center pt-1 mb-5 pb-1">
                                                                <button class="btn btn-primary btn-block gradient-custom-2 mb-3" type="submit">Log in</button>
                                                                <a class="text-muted" href="#!">Forgot password?</a>
                                                            </div>

                                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                                <p class="mb-0 me-2">Don't have an account?</p>
                                                                <a href="{{ route('user.registration') }}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</a>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                                        @if(session('user_not_found_error'))
                                                            <div class="alert alert-danger">
                                                                {{ session('user_not_found_error') }}
                                                            </div>
                                                        @endif
                                                        <h4 class="mb-4">We are more than just a company</h4>
                                                        <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const captchaFooterLink = document.querySelector('a[href*="captcha.org/captcha.html?laravel"]');
            if (captchaFooterLink) {
                captchaFooterLink.style.display = 'none';
            }
        });
    </script>
</body>
</html>
