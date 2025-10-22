@extends('layout.main')

@section('title', 'Edit Product')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- Ambil data nama produknya --}}
    <h1 class="h2">Edit Product: T-Shirt Black (M)</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="#" method="POST" enctype="multipart/form-data">
            {{-- @csrf --}}
            {{-- @method('PUT') --}}
            
            <div class="row">
                {{-- Kolom Kiri --}}
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" value="T-Shirt Black (M)" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5">Kaos katun hitam premium ukuran Medium</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sale_price" class="form-label">Sale Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="sale_price" value="150000">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="purchase_cost" class="form-label">Purchase Cost</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="purchase_cost" value="80000">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="product_image" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="product_image">
                        <small class="text-muted">Current image: t-shirt-black.jpg (Leave blank to keep current image)</small>
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU (Stock Keeping Unit)</label>
                        <input type="text" class="form-control" id="sku" value="TS-BLK-M" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category">
                            <option>Choose category...</option>
                            <option selected>T-Shirts</option> {{-- 'selected' akan dinamis --}}
                            <option>Jeans</option>
                            <option>Hoodies</option>
                            <option>Sneakers</option>
                            <option>Accessories</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <select class="form-select" id="supplier">
                            <option>Choose supplier...</option>
                            <option selected>Supplier Garmentindo</option> {{-- 'selected' akan dinamis --}}
                            <option>Supplier Bahan Kain</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock Quantity</label>
                        <input type="number" class="form-control" id="stock" value="120">
                    </div>
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-end">
                <a href="{{ route('inventory.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection