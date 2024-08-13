@extends('layouts.main')

@section('title')
    Detail Products
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?outdoors'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">DETAIL PRODUCT</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show w-25 ms-auto me-auto text-light fw-bold" role="alert">
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
            <span class="alert-text">{{ session('error') }}</span>
            <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true" class="text-light text-dark fw-bold fs-4">&times;</span>
            </button>
        </div>
    @endif

    <div class="container-fluid">
        <a href="/products" class="col-lg-2 fw-bold text-dark ms-3">
            <i class="fa-solid fa-arrow-left"></i> Back to products
        </a><br><br>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center align-items-center">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid rounded"
                        style="height:200px; width:220px">
                @else
                    <img src="{{ asset('storage/product-images/no-img.jpg') }}" alt="Product Image"
                        class="img-fluid rounded" style="height:200px; width:200px">
                @endif
                <div class="h5 mt-3">{{ $product->name }}</div>
                <div class="small mt-2 fw-bold">
                    Price : Rp{{ number_format($product->price, 2, ',', '.') }} / day
                    <span class="mx-2 h6">|</span>
                    Stock : {{ $product->stock }}
                </div>
                <hr class="hr bg-dark w-75 m-auto mt-2">
                <div class="col-9 mt-4 m-auto">
                    <div class="lead text-start fw-bold text-dark mb-2">Description</div>
                    <div class="fw-normal text-dark" style="text-align:justify">
                        {!! $product->description !!}
                    </div>
                </div>

                <div class="mt-4 me-4 text-dark fw-bold">
                    <button type="button" class="btn bg-gradient-success btn-block" data-bs-toggle="modal"
                        data-bs-target="#cartModal">
                        <i class="fa-solid fa-cart-shopping mx-1"></i>
                        Add to Cart
                    </button>
                </div>

                <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                    <a type="button" class="fs-5 text-dark fw-bold text-end me-4 mt-3"
                                        data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></a>
                                    <div class="card-header pb-0 text-left">
                                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded"
                                            alt="Item Image" style="height:120px; width:150px">
                                        <p class="mb-0 mt-2 fw-bold">{{ $product->name }}</p>
                                    </div>
                                    <div class="card-body pb-2">
                                        <form action="/user/cart/add" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <label class="fw-bold" for="quantity">Quantity :</label>
                                            <div class="input-group mb-3 w-50 m-auto">
                                                <input type="number" class="form-control rounded border text-center"
                                                    min="1" name="quantity" id="quantity" required>
                                            </div>
                                            <button type="submit" onclick="return confirm('Add to your cart?')"
                                                class="btn bg-gradient-success btn-sm rounded w-75 mt-3 mb-2">
                                                + Add
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
