@extends('layout.main')

@section('title', 'Inventory Management')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Inventory Management</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('inventory.create') }}" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle"></i>
            Add New Product
        </a>
    </div>
</div>

{{-- Fitur Filter dan Search --}}
<div class="card mb-3">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Search by product name or SKU...">
            </div>
            <div class="col-md-4">
                <select class="form-select">
                    <option selected>Filter by category...</option>
                    <option>T-Shirts</option>
                    <option>Jeans</option>
                    <option>Hoodies</option>
                    <option>Sneakers</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-secondary w-100">Search</button>
            </div>
        </div>
    </div>
</div>

{{-- Tabel Daftar Produk --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">SKU</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock on Hand</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh Data 1: In Stock --}}
                    <tr>
                        <td>TS-BLK-M</td>
                        <td>T-Shirt Black (M)</td>
                        <td>T-Shirts</td>
                        <td>Rp 150.000</td>
                        <td>120</td>
                        <td><span class="badge bg-success">In Stock</span></td>
                        <td>
                            <a href="{{ route('inventory.edit') }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    {{-- Contoh Data 2: Low Stock --}}
                    <tr>
                        <td>JN-BLU-32</td>
                        <td>Jeans Blue (32)</td>
                        <td>Jeans</td>
                        <td>Rp 450.000</td>
                        <td>8</td>
                        <td><span class="badge bg-warning text-dark">Low Stock</span></td>
                        <td>
                            <a href="{{ route('inventory.edit') }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    {{-- Contoh Data 3: Out of Stock --}}
                    <tr>
                        <td>SK-WHT-42</td>
                        <td>Sneakers White (42)</td>
                        <td>Sneakers</td>
                        <td>Rp 750.000</td>
                        <td>0</td>
                        <td><span class="badge bg-danger">Out of Stock</span></td>
                        <td>
                            <a href="{{ route('inventory.edit') }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                     {{-- Contoh Data 4: In Stock --}}
                    <tr>
                        <td>HD-GRY-L</td>
                        <td>Hoodie Gray (L)</td>
                        <td>Hoodies</td>
                        <td>Rp 350.000</td>
                        <td>75</td>
                        <td><span class="badge bg-success">In Stock</span></td>
                        <td>
                            <a href="{{ route('inventory.edit') }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection