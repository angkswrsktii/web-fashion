@extends('layout.main')

@section('title', 'Add New Product')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Product</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="#" method="POST" enctype="multipart/form-data">
            {{-- @csrf --}}
            <div class="row">
                {{-- Kolom Kiri --}}
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" placeholder="e.g., T-Shirt Black" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5" placeholder="Details about the product..."></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sale_price" class="form-label">Sale Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="sale_price" placeholder="150000">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="purchase_cost" class="form-label">Purchase Cost</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="purchase_cost" placeholder="80000">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="product_image" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="product_image">
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU (Stock Keeping Unit)</label>
                        <input type="text" class="form-control" id="sku" placeholder="e.g., TS-BLK-M" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category">
                            <option selected>Choose category...</option>
                            <option>T-Shirts</option>
                            <option>Jeans</option>
                            <option>Hoodies</option>
                            <option>Sneakers</option>
                            <option>Accessories</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <select class="form-select" id="supplier">
                            <option selected>Choose supplier...</option>
                            <option>Supplier Garmentindo</option>
                            <option>Supplier Bahan Kain</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Initial Stock Quantity</label>
                        <input type="number" class="form-control" id="stock" value="10">
                    </div>
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-end">
                <a href="{{ route('inventory.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
        </form>
    </div>
</div>
@endsection