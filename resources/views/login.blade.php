<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Events Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       
        .um-red-bg {
            background-color: #8B0000; 
        }
        .um-red-bg:hover {
            background-color: #A52A2A; 
        }
        .um-red-text {
            color: #8B0000;
        }
        .um-red-light-text {
            color: #A52A2A;
        }
        .um-red-border {
            border-color: #8B0000 !important;
        }
        .form-control:focus {
            border-color: #A52A2A;
            box-shadow: 0 0 0 0.25rem rgba(165, 42, 42, 0.25);
        }
    </style>
</head>
<body class="bg-light font-sans antialiased d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="row d-flex flex-column flex-lg-row align-items-center justify-content-center p-4 p-lg-5">

            <!-- Left Section: Welcome Message and Features -->
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 pe-lg-5">
                <h1 class="display-7 fw-bold text-dark mb-3">
                    Welcome to <br>
                    <span class="um-red-light-text">The University of Mindanao</span>
                </h1>
                <h2 class="display-3 fw-bold text-dark mb-4 lh-sm">
                    EVENTS <br>
                    MANAGEMENT <br>
                    SYSTEM
                </h2>
                <p class="text-black fs-5 mb-4">Login to manage your events anytime, anywhere.</p>

                <ul class="list-unstyled space-y-3 text-start d-inline-block d-lg-block">
                    <li class="d-flex align-items-center text-dark fs-5">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        Book venues and check availability.
                    </li>
                    <li class="d-flex align-items-center text-dark fs-5">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        Request and manage equipment.
                    </li>
                    <li class="d-flex align-items-center text-dark fs-5">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        View and update event details.
                    </li>
                </ul>
            </div>

            <!-- Right Section: Login Form -->
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                <div class="card shadow-xlg p-4 p-md-5 w-500" style="max-width: 500px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center left-align-content-center mb-4">
                            <!-- Placeholder for the University of Mindanao logo -->
                            <img src="{{ asset('images/um-logo.png') }}" alt="University of Mindanao Logo" class="me-3" style="height: 64px; width: 64px;">
                            <div>
                                <h3 class="card-title h6 fw-bold text-dark   mb-0">UNIVERSITY OF MINDANAO</h3>
                                <p class="mb-0 fw-bold text-dark">EVENTS MANAGEMENT SYSTEM</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label sr-only">Email or UM ID</label>
                                <input type="text" id="email" name="email"
                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       placeholder="Email or UM ID" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label sr-only">Password</label>
                                <input type="password" id="password" name="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label class="form-check-label text-dark" for="remember">Remember me</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none um-red-text hover-underline">Forgot your Password?</a>
                                @endif
                            </div>

                            <div>
                                <button type="submit" class="btn um-red-bg text-white btn-lg w-100 d-flex align-items-center justify-content-center transition-hover">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    LOGIN
                                </button>
                            </div>
                        </form>

                        <p class="text-muted small mt-4 text-center">
                            By continuing you accept the <a href="#" class="um-red-text fw-bold text-decoration-none hover-underline">Terms of Use</a>, <a href="#" class="um-red-text fw-bold text-decoration-none hover-underline">Privacy Policy</a>, and <a href="#" class="um-red-text fw-bold text-decoration-none hover-underline">Data Policy</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>