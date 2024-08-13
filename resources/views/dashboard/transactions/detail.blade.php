@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Detail Transaction
@endsection

@section('main-content')

@section('active-menu')
    Transactions
@endsection

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Detail Transaction
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
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
                                @foreach ($rentProducts as $row)
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
                                        Total</td>
                                    <td class="text-center align-middle fw-bold table-dark small rounded-end">
                                        Rp{{ number_format($rentProducts->sum('total_price'), 2, ',', '.') }}
                                    </td>
                                </tr>
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
