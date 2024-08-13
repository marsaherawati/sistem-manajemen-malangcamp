@extends('layouts.main')

@section('title')
    MalangCamp
@endsection

@section('header')
    <div class="page-header min-vh-100" style="background-image: url('{{ asset('assets/img/bg.jpg') }}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show w-25 ms-auto me-auto text-light" role="alert">
                    <span class="alert-icon"><i class="fa-solid fa-triangle-exclamation mx-2"></i></span>
                    <span class="alert-text text-light">{{ session('error') }}</span>
                    <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mx-auto my-auto">
                    <h2 class="text-white">Find Your Camp Equipment</h2>
                    <p class="lead mb-4 text-white opacity-8">Easy Rent, Easy Camp </p>
                    <a href="/products" class="btn btn-success text-light text-capitalize h6 fw-bold">
                        Rent Now!
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 bg-gradient-success rounded">
                <div class="row justify-content-start px-4 mt-4">
                    <div class="col-md-6">
                        <div class="info">
                            <i class="material-icons text-3xl text-light mb-2">done_all</i>
                            <h5 class="lead">Easy Rent</h5>
                            <p class="text-light">Only from home, you can find what you need</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info">
                            <i class="material-icons text-3xl text-light mb-2">quickreply</i>
                            <h5 class="lead">Responsive Admin</h5>
                            <p class="text-light">If you got troubles, just contact us on WhatsApp</p>
                        </div>
                    </div>
                </div>
                <hr class="border border-light border-2 my-3">
                <div class="row justify-content-start px-4 mb-3">
                    <div class="col-md-6">
                        <div class="info">
                            <i class="material-icons text-3xl text-light mb-2">apps</i>
                            <h5 class="lead">Many Stocks</h5>
                            <p class="text-light">We guaranteed, based on other stores in Malang</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info">
                            <i class="material-icons text-3xl text-light mb-2">3p</i>
                            <h5 class="lead">Feedback</h5>
                            <p class="text-light">We wait for your impactfull feedback</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
