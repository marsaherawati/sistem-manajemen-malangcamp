@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Products
@endsection

@section('active-menu')
    Products
@endsection

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-3">
                                Edit Product
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-7 m-auto shadow-lg rounded p-4">
                            <form action="/dashboard/products/{{ $product->id }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="input-group input-group-static mb-4">
                                    <label for="image">Image</label>
                                    <input type="hidden" name="oldImage" value="{{ $product->image }}">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            class="img-preview img-fluid rounded m-auto col-sm-5">
                                    @else
                                        <img class="img-preview img-fluid rounded m-auto col-sm-5">
                                    @endif
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" onchange="previewImg()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $product->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="category">Category</label>
                                    <select type="text" class="form-control" name="category_id" id="category">
                                        <option selected>--Select Category--</option>
                                        @foreach ($categories as $category)
                                            @if (old('category_id', $product->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="description">Description</label>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" id="description" name="description"
                                        value="{{ old('description', $product->description) }}">
                                    <trix-editor input="description"></trix-editor>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $product->price) }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                        id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
                                    @error('stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-pen-nib me-1"></i>
                                        Update
                                    </button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        // Preview Image
        function previewImg() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection

@push('custom-scripts')
@endpush
