@extends('layouts.main')

@section('title')
    User | Checkout
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?bills'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">CHECKOUT</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

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
            <div class="alert alert-danger alert-dismissible fade show w-50 ms-auto me-auto text-light" role="alert">
                <span class="alert-icon"><i class="fa-solid fa-triangle-exclamation mx-2"></i></span>
                <span class="alert-text text-light">{{ session('error') }}</span>
                <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
                </button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card bg-gradient-success">
                    <div class="card-body">
                        <div class="col-lg-4 mb-2">
                            <a href="/user/cart" class="btn text-light fw-bold fs-6 text-capitalize"
                                onclick="return confirm('Leave Checkout?')">
                                <i class="fa-solid fa-arrow-left me-2"></i>
                                Back to Cart
                            </a>
                        </div>
                        <div class="row justify-content-center gap-3">
                            <div class="col-lg-9 p-4 rounded shadow-lg bg-gradient-light">
                                <div class="col-lg-3 mb-2 fs-6 fw-bold text-dark">Items :</div>
                                @foreach ($items as $item)
                                    <div class="col-lg-8 mb-2">
                                        <div class="card rounded">
                                            <div class="card-body p-3 text-xs">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-lg-4 mb-2 text-center">
                                                        <img src="{{ asset('storage/' . $item->product->image) }}"
                                                            class="img-fluid rounded" alt="Item Image"
                                                            style="height:40px; width:60px">
                                                        <div class="mt-1 ms-1 fw-bold">{{ $item->product->name }}</div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2 fw-bold">
                                                        <div class="text-center">x{{ $item->quantity }}</div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2 fw-bold">
                                                        <div class="text-center">
                                                            Rp{{ number_format($item->subtotal, 2, ',', '.') }} / day
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-lg-3">
                                    <div class="card rounded">
                                        <div class="card-body small fw-bold py-2 text-dark">Total :
                                            <span class="small text-dark">
                                                Rp{{ number_format($items->sum('subtotal'), 2, ',', '.') }} / day
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 shadow bg-gray-100 rounded p-3 w-lg-75">
                                    <div class="h6 mb-2">Detail</div>
                                    <hr class="hr bg-dark mt-0">
                                    <form action="/user/rent/checkout" method="post">
                                        @csrf
                                        <label for="rent_start" class="fw-bold">Mulai Sewa</label>
                                        <input type="datetime-local" name="rent_start" id="rent_start"
                                            class="form-control bg-gradient-light border-0 d-block mb-2 small px-2 py-1 w-lg-75 fw-bold"
                                            onchange="getRentEnd()" required>
                                        <label for="duration" class="fw-bold">Durasi Sewa (/hari)</label>
                                        <input type="number" name="duration" id="duration"
                                            class="form-control bg-gradient-light border-0 d-block small mb-2 px-2 py-1 w-50 fw-bold"
                                            onchange="getRentEnd(); getTotalPrice();" required>
                                        <input type="hidden" name="total" id="total"
                                            value="{{ $items->sum('subtotal') }}">

                                        <label for="rent_end" class="fw-bold">Akhir Sewa</label>
                                        <input type="datetime-local" name="rent_end" id="rent_end"
                                            class="form-control bg-gradient-light border-0 d-block mb-3 small px-2 py-1 w-lg-75 fw-bold"
                                            readonly>
                                        <div class="h6 mt-4">
                                            <label for="total_price" class="h6">Total Bayar :</label>
                                            <input type="text" name="total_price" id="total_price"
                                                class="px-2 fw-bold bg-transparent border-0 small text-dark" disabled>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-success btn-sm mt-2 fw-bold text-light">
                                                <i class="fa-solid fa-money-bill me-1 fs-6"></i>
                                                Process
                                            </button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function getRentEnd() {
                var duration = document.getElementById('duration').value;
                var rentStart = document.querySelector('#rent_start');
                var rentEnd = document.querySelector('#rent_end');

                var rentStartDate = new Date(rentStart.value);
                var rentEndDate = new Date();
                var days = parseInt(duration, 10);

                rentEndDate.setDate(rentStartDate.getDate() + days);

                var tahun = rentEndDate.getFullYear();
                var bulan = ('0' + (rentEndDate.getMonth() + 1)).slice(-2);
                var tanggal = ('0' + rentEndDate.getDate()).slice(-2);
                var jam = ('0' + rentStartDate.getHours()).slice(-2);
                var menit = ('0' + rentStartDate.getMinutes()).slice(-2);
                var rentEndDateString = tahun + "-" + bulan + "-" + tanggal + "T" + jam + ":" + menit;

                rentEnd.value = rentEndDateString;
            }

            function getTotalPrice() {
                var duration = document.querySelector('#duration').value;
                var total = document.querySelector('#total').value;
                var totalPriceField = document.querySelector('#total_price');

                var totalPrice = parseFloat(total);

                totalPrice = totalPrice * duration;

                const options = {
                    style: 'currency',
                    currency: 'IDR'
                };

                totalPriceField.value = totalPrice.toLocaleString('id-ID', options).replace(/\s/g, '');
            }
        </script>
    </div>
@endsection
