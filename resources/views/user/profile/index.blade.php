@extends('layouts.main')

@section('title')
    User | Profile
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x600?hiker'); height:42vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">YOUR PROFILE</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show w-25 ms-auto me-auto text-light fw-bold"
                role="alert">
                <span class="alert-icon"><i class="fa-solid fa-thumbs-up mx-2"></i></span>
                <span class="alert-text">{{ session('success') }}</span>
                <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </button>
            </div>
        @endif

        @if (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show w-50 ms-auto me-auto text-light" role="alert">
                <span class="alert-icon"><i class="fa-solid fa-exclamation mx-2 fs-5"></i></span>
                <span class="alert-text">{{ session('warning') }}</span>
                <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                </button>
            </div>
        @endif

        <div class="row justify-content-center bg-gradient-success rounded gap-3">

            <div class="col-lg-3 mb-2 mt-5 text-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo"
                        class="img-fluid rounded-circle shadow-lg" style="height:260px; width:250px">
                @else
                    <img src="{{ asset('storage/user-photos/no-photo.png') }}" alt="User Photo"
                        class="img-fluid rounded-circle shadow-lg" style="height:260px; width:250px">
                @endif
            </div>
            <div class="col-lg-6 text-light my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="name mb-2">
                            <small class="fw-bold text-muted">Name</small>
                            <div class="h6 text-dark fw-bold">{{ $user->name }}</div>
                        </div>
                        <div class="username mb-2">
                            <small class="text-muted fw-bold">Username</small>
                            <div class="h6 text-dark fw-bold">{{ $user->username }}</div>
                        </div>
                        <div class="email mb-2">
                            <small class="text-muted fw-bold">Email</small>
                            <div class="h6 text-dark fw-bold">{{ $user->email }}</div>
                        </div>
                        <div class="address mb-5">
                            <small class="text-muted fw-bold">Address</small>
                            <div class="fw-bold text-uppercase text-xs text-dark">{{ $user->address }}</div>
                        </div>
                        <div class="update text-end">
                            <a href="/user/profile/{{ $user->id }}/edit"
                                class="btn btn-success text-light fw-bold btn-sm">
                                <i class="fa-solid fa-pen-to-square mx-1 fs-6"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
