@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Transactions
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

@section('active-menu')
    Transactions
@endsection

@php
    use Carbon\Carbon;
@endphp

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Transactions Table
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0" id="transactTable">
                            <thead>
                                <tr class="table-success">
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        #
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        User
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
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm text-start">
                                                        {{ $rent->user->name }}
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $rent->user->email }}
                                                    </p>
                                                </div>
                                            </div>
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
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ Carbon::parse($rent->rent_start)->format('l, d M Y H:i') }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ Carbon::parse($rent->rent_end)->format('l, d M Y H:i') }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $rent->status }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center gap-2">
                                            <a class="btn btn-sm btn-success text-capitalize text-xxs my-2"
                                                href="/dashboard/transactions/{{ $rent->id }}">Detail</a>
                                            @if ($rent->status == 'Paid')
                                                <form action="/dashboard/transactions/{{ $rent->id }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-info text-capitalize text-xxs my-2"
                                                        href="/dashboard/transactions/confirm?id={{ $rent->id }}"
                                                        onclick="return confirm('Confirm Transaction?')">Confirm</button>
                                                </form>
                                            @endif
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
