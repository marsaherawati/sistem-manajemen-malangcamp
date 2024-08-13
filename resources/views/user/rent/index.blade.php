@extends('layouts.main')

@section('title')
    User | Rent
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?camp'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">YOUR RENTS</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    use Carbon\Carbon;
@endphp

@section('container')
    <div class="container">

        @if (session()->has('success'))
            <div class="alert alert-info alert-dismissible fade show w-25 ms-auto me-auto text-light" role="alert">
                <span class="alert-icon"><i class="fa-solid fa-thumbs-up mx-2"></i></span>
                <span class="alert-text">{{ session('success') }}</span>
                <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                </button>
            </div>
        @endif
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

        <div class="col-lg-6 mb-3">
            <div class="h5">Total : {{ $rents->count() }} Rent</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0" id="userRentTable">
                            <thead>
                                <tr class="table-success">
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        #
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Rent Id
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Duration
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Start At</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        End At
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Status
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Payment
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rents as $rent)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bolder text-dark">{{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $rent->rent_id }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold text-lowercase">{{ $rent->duration }}
                                                day(s)
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ Carbon::parse($rent->rent_start)->format('l, d M Y H:i') }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ Carbon::parse($rent->rent_end)->format('l, d M Y H:i') }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $rent->status }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($rent->status == 'Unpaid')
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <form action="/user/rent/reCheckout" method="post">
                                                        @csrf
                                                        <input type="hidden" name="rent_id" value="{{ $rent->id }}">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-warning text-xxs my-auto">
                                                            Pay
                                                        </button>
                                                    </form>
                                                </span>
                                            @endif
                                            <span
                                                class="text-secondary text-xs font-weight-bold text-uppercase">{{ $rent->payment_method }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-sm btn-success text-capitalize text-xxs my-auto"
                                                href="/user/rent/detail?id={{ $rent->id }}">Detail</a>
                                            {{-- <form action="/user/rent/print" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="rent_id" value="{{ $rent->id }}"> --}}
                                            {{-- <button type="submit"
                                                class="btn btn-sm btn-info text-capitalize text-xxs my-auto"
                                                target="_blank">
                                                Print PDF
                                            </button> --}}
                                            <a href="/user/rent/print/{{ $rent->id }}"
                                                class="btn btn-sm btn-info text-capitalize text-xxs my-auto"
                                                target="_blank">
                                                Print PDF
                                            </a>
                                            {{-- </form> --}}
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
@endsection
