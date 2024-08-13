@extends('layouts.main')

@section('title')
    User | Rent Detail
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?camp'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">DETAIL RENT</h3>
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
        <div class="col-lg-6 mb-3">
            <div class="h5">Detail of Rent ID : {{ $rent->rent_id }}</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0 p-3" id="rentDetail">
                            <thead>
                                <tr class="table-success">
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Item
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Product
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Quantity
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9 text-dark">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rent_products as $row)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bolder text-dark">{{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{ asset('storage/' . $row->product->image) }}" alt="Item Image"
                                                class="img-fluid rounded" style="width:40px; height:40px">
                                            <span
                                                class="text-secondary text-xs font-weight-bold ms-2">{{ $row->product->name }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bolder text-dark">{{ $row->quantity }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bolder text-dark">Rp{{ number_format($row->total_price, 2, ',', '.') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td
                                        class="text-center align-middle fw-bold table-dark small text-uppercase rounded-start">
                                        Total Paid</td>
                                    <td class="text-center align-middle fw-bold table-dark small rounded-end">
                                        Rp{{ number_format($rent_products->sum('total_price'), 2, ',', '.') }} x
                                        {{ $rent->duration }} day(s) =
                                        Rp{{ number_format($rent_products->sum('total_price') * $rent->duration, 2, ',', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
