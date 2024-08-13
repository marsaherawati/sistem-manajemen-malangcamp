@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Detail Product
@endsection

@section('active-menu')
    Products
@endsection
@section('main-content')
    <br>
    <a class="ms-5" href="/dashboard/products"><i class="fa-solid fa-arrow-left"></i> Back to products</a>
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                            <h5 class="text-white text-capitalize text-center">
                                {{ $product->name }}
                            </h5>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2 col-lg-11 text-center m-auto">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded"
                                alt="product-image" style="width:200px; height:200px" />
                        @else
                            <img src="{{ asset('storage/product-images/no-img.jpg') }}" class="img-fluid rounded"
                                alt="product-image" style="width:200px; height:200px" />
                        @endif
                        <div class="fw-bold">
                            <span class="text-xs mx-2">Price : IDR {{ $product->price }} / day</span>
                            <span class="fw-normal">|</span>
                            <span class="text-xs mx-2">Stock : {{ $product->stock }} pcs</span>
                        </div>
                        <div class="desc mt-4">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
@endpush
