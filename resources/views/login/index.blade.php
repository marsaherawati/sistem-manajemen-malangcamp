<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        Login
    @endsection
    @include('dashboard.layouts.head-content')
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
                    <div class="container-fluid ps-2 pe-0">
                        <a class="navbar-brand ms-lg-0 ms-3" href="/">
                            <span class="text-light fs-5 fw-normal"><span
                                    class="fw-bold text-success">MALANG</span>CAMP</span>
                        </a>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="
                    background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');
                ">
            <span class="mask bg-gradient-dark opacity-6"></span>

            <div class="container my-auto">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show w-50 ms-auto me-auto text-light"
                        role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2 mx-2"></i></span>
                        <span class="alert-text">{{ session('success') }}</span>
                        <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                        </button>
                    </div>
                    <br><br>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show w-50 ms-auto me-auto text-light"
                        role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2 mx-2"></i></span>
                        <span class="alert-text">{{ session('message') }}</span>
                        <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                        </button>
                    </div>
                    <br><br>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show w-50 ms-auto me-auto text-light"
                        role="alert">
                        <div class="d-flex align-items-center">
                            <span class="material-icons fs-4">
                                report_problem
                            </span>
                            <span class="alert-text mx-2 pt-1 fs-5">{{ session('loginError') }}</span>
                        </div>
                        <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                        </button>
                    </div>
                    <br><br>
                @endif
                <br><br>
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                        Sign in
                                    </h4>
                                    <p class="mb-0 text-center text-dark small fw-bold">
                                        Enter your registered account
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" class="text-start" method="post" action="/login">
                                    @csrf
                                    <div class="input-group input-group-outline my-3 py-2">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required
                                            autofocus />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="input-group input-group-outline mb-3 pt-2" style="width:90%">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required />
                                        </div>
                                        <button type="button" class="eye btn p-0 fs-6 mx-2" data-bs-toggle="tooltip"
                                            data-bs-title="Show Password" onclick="showPW()">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="eye-slash btn p-0 fs-6 mx-2 d-none"
                                            data-bs-toggle="tooltip" data-bs-title="Hide Password" onclick="hidePW()">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">
                                            Sign in
                                        </button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="/register" class="text-success text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                    <p class="text-sm text-center">
                                        Forgot password?
                                        <a href="/forget-password"
                                            class="text-info text-gradient font-weight-bold">Change
                                            Password
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('dashboard.layouts.foot-content')
    <script>
        function showPW() {
            const inputPW = document.querySelector('#password');
            const eye = document.querySelector('.eye');
            const eyeSlash = document.querySelector('.eye-slash');

            inputPW.type = 'text';
            eye.classList.add('d-none');
            eyeSlash.classList.remove('d-none');
        }

        function hidePW() {
            const inputPW = document.querySelector('#password');
            const eye = document.querySelector('.eye');
            const eyeSlash = document.querySelector('.eye-slash');

            inputPW.type = 'password';
            eyeSlash.classList.add('d-none');
            eye.classList.remove('d-none');
        }
    </script>
</body>

</html>
