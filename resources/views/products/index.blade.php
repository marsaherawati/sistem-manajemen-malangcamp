@extends('layouts.main')

@section('title')
    MalangCamp | Products
@endsection

@section('header')
    <div class="page-header" style="background-image: url('{{ asset('assets/img/products.jpg') }}'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">PRODUCTS</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="col-lg-4 m-auto mb-4 text-center">
        <form action="/products">
            <div class="input-group input-group-dynamic is-valid shadow-lg ps-2 rounded bg-gray-200 text-dark">
                <input type="search" class="form-control pe-3" name="search" id="search"
                    value="{{ request('search') }}" placeholder="Search..">
                <button class="btn my-auto my-auto bg-success" type="submit" data-bs-toggle="tooltip"
                    data-bs-title="Search" data-bs-placement="right">
                    <i class="fa-solid fa-search fa-lg fw-bold text-light"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="container shadow-lg rounded bg-gradient-success">
        <div class="p-4">
            <div class="row">
                <div class="col-md-6 text-start mb-4 mt-2">
                    <h3 class="text-light fw-bold z-index-1 position-relative">
                        @if (request('category'))
                            <div class="text-capitalize">
                                @foreach ($products as $product)
                                    @if ($loop->first)
                                        {{ $product->category->name }}
                                    @endif
                                @endforeach
                            </div>
                        @elseif(request('search'))
                            <div class="small">All result of <span class="text-dark mx-1">{{ request('search') }}</span>
                                :
                            </div>
                        @else
                            All Products
                        @endif
                    </h3>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-md-5 mb-4">
                        <div class="card bg-gray-300 card-profile">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 col-12 mt-n4">
                                    <div class="p-3 pe-md-0">
                                        @if ($product->image)
                                            <a href="/products/{{ $product->id }}">
                                                <div class="col-lg-10">
                                                    <img class="border-radius-md shadow-lg img-fluid"
                                                        src="{{ asset('storage/' . $product->image) }}" alt="image"
                                                        style="height:110px; width:200px" />
                                                </div>
                                            </a>
                                        @else
                                            <div class="col-lg-10">
                                                <img class="border-radius-md shadow-lg img-fluid"
                                                    src="https://source.unsplash.com/300x300?camp" alt="image"
                                                    style="height:110px; width:200px" />
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 m-auto">
                                    <div class="card-body ps-lg-2">
                                        <h6 class="mb-0">{{ $product->name }}</h6>
                                        <small class="text-info fw-bold">
                                            {{ $product->category->name }}
                                        </small>
                                        <small class="mb-0 d-block">
                                            Rp{{ number_format($product->price, 2, ',', '.') }} / day
                                            <a href="/products/{{ $product->id }}" class="fw-bold fs-5 mx-3"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Detail Product">→
                                            </a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="justify-content-center pagination pagination-dark text-dark fw-bold">
                    {{ $products->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection
