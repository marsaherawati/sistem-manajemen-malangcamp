<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        Change Password
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
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                        Change Password
                                    </h4>
                                    <div class="small text-center text-dark">Enter your registered email</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" class="text-start" method="post"
                                    action="{{ route('password.post') }}">
                                    @csrf
                                    <div class="input-group input-group-outline">
                                        <input type="hidden" class="form-control" id="token" name="token"
                                            value="{{ $token }}" />
                                    </div>
                                    <div class="input-group input-group-outline mb-2 py-2">
                                        <label class="form-label" for="email">Registered Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" required autofocus />
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="input-group input-group-outline mb-2 py-2" style="width:90%">
                                            <label class="form-label" for="password">New password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" required />
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <button type="button" class="eye btn p-0 btn-lg mx-2 mt-2"
                                            data-bs-toggle="tooltip" data-bs-title="Show Password" onclick="showPW()">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="eye-slash btn p-0 btn-lg mx-2 mt-2 d-none"
                                            data-bs-toggle="tooltip" data-bs-title="Hide Password" onclick="hidePW()">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="input-group input-group-outline mb-2 py-2" style="width:90%">
                                            <label class="form-label" for="password_confirmation">Confirmation
                                                Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation" required />
                                            @if ($errors->has('password_confirmation'))
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <button type="button" class="eye1 btn p-0 btn-lg mx-2 mt-2"
                                            data-bs-toggle="tooltip" data-bs-title="Show Password" onclick="showPW1()">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="eye-slash1 btn p-0 btn-lg mx-2 mt-2 d-none"
                                            data-bs-toggle="tooltip" data-bs-title="Hide Password" onclick="hidePW1()">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-sm bg-gradient-success w-50">
                                            Change Password
                                        </button>
                                    </div>
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

        function showPW1() {
            const inputPW = document.querySelector('#password_confirmation');
            const eye = document.querySelector('.eye1');
            const eyeSlash = document.querySelector('.eye-slash1');

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

        function hidePW1() {
            const inputPW = document.querySelector('#password_confirmation');
            const eye = document.querySelector('.eye1');
            const eyeSlash = document.querySelector('.eye-slash1');

            inputPW.type = 'password';
            eyeSlash.classList.add('d-none');
            eye.classList.remove('d-none');
        }
    </script>
</body>

</html>
