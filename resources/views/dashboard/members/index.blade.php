@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Members
@endsection

@section('main-content')

@section('active-menu')
    Members
@endsection

@section('main-content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show w-50 ms-auto me-auto text-light" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2 mx-2"></i></span>
            <span class="alert-text">{{ session('success') }}</span>
            <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-3">
                                Members Table
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive px-4">
                            <table class="table align-items-center mb-2" id="memberTable">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Username
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <div class="d-flex px-2 py-1">
                                                    @if ($member->photo)
                                                        <div>
                                                            <img src="{{ asset('storage/' . $member->photo) }}"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="Member Photo" />
                                                        </div>
                                                    @else
                                                        <div>
                                                            <img src="{{ asset('storage/user-photos/no-photo.png') }}"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="Member Photo" />
                                                        </div>
                                                    @endif
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ $member->name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $member->username }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $member->email }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xxs font-weight-bold">{{ $member->address }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="/dashboard/members/{{ $member->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="border-0 text-secondary font-weight-bold text-xs bg-transparent"
                                                        data-bs-toggle="tooltip" data-bs-title="Delete Member"
                                                        onclick="return confirm('Do you want to delete?')">
                                                        <i class="fa-solid fa-trash mx-1"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
@endpush
