@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Products
@endsection

@section('active-menu')
    Products
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
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show w-50 ms-auto me-auto text-light" role="alert">
            <span class="alert-icon"><i class="fa-solid fa-triangle-exclamation fa-lg mx-2"></i></span>
            <span class="alert-text text-light fs-5">{{ session('error') }}</span>
            <button type="button" class="btn-close mx-2 d-flex align-items-center" data-bs-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true" class="text-light fw-bold fs-4"><i class="fa-solid fa-xmark"></i></span>
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
                                Products Table
                            </h6>
                            <div class="ms-auto text-light me-4">
                                <a href="/dashboard/products/create" class="btn btn-sm btn-dark fw-bold small text-light"
                                    data-bs-toggle="tooltip" data-bs-title="Add New Product">
                                    <i class="fa-solid fa-plus mx-1 fs-6"></i>
                                    Add Product
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive px-4">
                            <table class="table align-items-center mb-0" id="productTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Identity
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Stock
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    @if ($product->image)
                                                        <div>
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="product-image" />
                                                        </div>
                                                    @else
                                                        <div>
                                                            <img src="{{ asset('storage/product-images/no-img.jpg') }}"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="product-image" />
                                                        </div>
                                                    @endif
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ $product->name }}
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ $product->category->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">Rp{{ number_format($product->price, 2, ',', '.') }}
                                                    / day</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $product->stock }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="/dashboard/products/{{ $product->id }}"
                                                    class="text-secondary font-weight-bold text-xs mx-1"
                                                    data-bs-toggle="tooltip" data-bs-title="Detail Product">
                                                    Detail
                                                </a> |
                                                <a href="/dashboard/products/{{ $product->id }}/edit"
                                                    class="text-secondary font-weight-bold text-xs mx-1"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit Product">
                                                    Edit
                                                </a> |
                                                <form action="/dashboard/products/{{ $product->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="border-0 text-secondary font-weight-bold text-xs bg-transparent"
                                                        data-bs-toggle="tooltip" data-bs-title="Delete Product"
                                                        onclick="return confirm('Do you want to delete?')">
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
