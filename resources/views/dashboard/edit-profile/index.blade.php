<?php $userid = $_GET['id']; ?>

@extends('dashboard.layouts.main')

@section('title')
    Members | Profile
@endsection

@section('main-content')

@section('menu-optional')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="/dashboard/members">Members</a>
    </li>
@endsection

@section('active-menu', 'Profile')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Profile Of <?= $userid ?>
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="edit-profile" style="display:flex; gap:20px;">
                        <div class="profile-pict">
                            <img src="{{ url('/img/photo1.png') }}" alt="profile-pict"
                                style="width:200px; height:200px; object-fit:cover;object-position: 100% 0">
                        </div>
                        <form style="width: 100%">
                            <div class="input-group input-group-static mb-4">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="name of <?= $userid ?>">
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="address of <?= $userid ?>">
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" placeholder="number of <?= $userid ?>">
                            </div>
                            <div class="submit-btn" style="text-align: center;">
                                <button class="btn btn-warning" type="button" style="">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
@endpush
