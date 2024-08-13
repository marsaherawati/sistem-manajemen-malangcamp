@extends('dashboard.layouts.main')

@section('title')
    Dashboard
@endsection

@section('main-content')

@section('active-menu')
    Dashboard
@endsection

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa-solid fa-tents"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">
                            Total Product
                        </p>
                        <h4 class="mb-0">{{ $products->count() }} Unit</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0" />
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">
                            Total User
                        </p>
                        <h4 class="mb-0">{{ $users->where('username', '!=', 'admin')->count() }} User</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0" />
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">
                            Total Online User
                        </p>
                        <h4 class="mb-0">
                            {{ $users->where('username', '!=', 'admin')->where('id', auth()->user()->id)->count() }}
                            User
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0" />
                <div class="card-footer p-3">
                </div>
            </div>
        </div> --}}
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">
                            Total Transaction
                        </p>
                        <h4 class="mb-0">{{ $rents->count() }} Transaction</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0" />
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
@endpush
