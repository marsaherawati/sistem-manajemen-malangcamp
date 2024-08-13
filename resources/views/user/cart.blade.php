@extends('layouts.main')

@section('title')
    User | Cart
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?camp'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">YOUR CART</h3>
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
            <div class="fw-bold h5 text-start">
                Total Item : {{ $carts->count() }}
            </div>
        </div>

        <div class="col-lg-7 ms-auto text-end">
            <div class="fw-bold mb-4 me-5">
                <a href="/products" class="btn btn-sm btn-dark mx-2">
                    <i class="fa-solid fa-tent fs-6 mx-1" style="color:rgb(109, 231, 221)"></i>
                    Add Item
                </a>
                @if ($carts->count() != 0)
                    <a href="/user/cart/clear" class="btn btn-sm btn-dark" onclick="return confirm('Clear Cart?')">
                        <i class="fa-solid fa-trash fs-6 mx-1" style="color:rgb(247, 81, 81)"></i>
                        Clear Cart
                    </a>
                @endif
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-lg-9">
                <div class="bg-gradient-success shadow rounded mb-4 p-4">

                    @if ($carts->count() == 0)
                        <div class="h3 text-light text-center">Your Cart is Empty</div>
                    @endif

                    @foreach ($carts as $row)
                        <div class="col-lg-11 m-auto">
                            <div class="card rounded mb-3">
                                <div class="card-body p-3">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2 text-center">
                                            <img src="{{ asset('storage/' . $row->product->image) }}"
                                                class="img-fluid rounded" alt="Item Image"
                                                style="height:100px; width:160px">
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2 text-center">
                                            <p class="small text-dark fw-bold my-0">{{ $row->product->name }}</p>
                                            <p class="small text-xxs fw-bold">
                                                <span class="text-muted">{{ $row->product->category->name }}</span>
                                            </p>
                                        </div>
                                        <div
                                            class="col-md-3 col-lg-3 col-xl-3 d-flex align-items-center m-auto text-xs fw-bold">
                                            <form action="/user/cart/update" method="post" class="p-0">
                                                @csrf
                                                <button type="submit" class="btn btn-link px-2 my-auto"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="quantity" name="quantity" value="{{ $row->quantity }}"
                                                    type="number" class="rounded text-center fw-bold" style="width:30%" />
                                                <input name="item_id" value="{{ $row->id }}" type="hidden" />

                                                <button type="submit" class="btn btn-link px-2 my-auto"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus text-info"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <div class="mb-0 small fw-bold text-dark" id="subtotal">
                                                Rp{{ number_format($row->subtotal, 2, ',', '.') }} / day
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2 text-end text-lg-center mt-3">
                                            <form action="/user/cart/delete" method="post">
                                                @csrf
                                                <input type="hidden" name="cart_id" value="{{ $row->id }}">
                                                <button type="submit" class="btn btn-dark btn-sm"
                                                    onclick="return confirm('Delete item?')">
                                                    <i class="fas fa-circle-xmark fs-6 my-1"
                                                        style="color:rgb(255, 97, 97)"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($carts->count() !== 0)
                        <div class="col-lg-4 ms-auto py-auto shadow-lg p-3 rounded bg-white">
                            <div class="fw-bold text-center h6">
                                Total :
                                <span class="text-sm">
                                    Rp{{ number_format($carts->sum('subtotal'), 2, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    @endif

                </div>

                <center>
                    <a href="/user/rent/checkout" class="btn btn-dark shadow">
                        <i class="fa-solid fa-cash-register fa-lg mx-1" style="color:rgb(39, 253, 111)"></i>
                        Checkout
                    </a>
                </center>
            </div>

        </div>
    </div>
@endsection
