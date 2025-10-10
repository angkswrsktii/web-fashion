@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    {{-- Cards Statistik --}}
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="card-text fs-4">Rp 120.000.000</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text fs-4">1,250</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Products Sold</h5>
                    <p class="card-text fs-4">3,500</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">New Customers</h5>
                    <p class="card-text fs-4">85</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Pesanan Terbaru --}}
    <h2 class="mt-4">Recent Orders</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Product</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1025</td>
                    <td>Budi Santoso</td>
                    <td>T-Shirt Black</td>
                    <td>Rp 150.000</td>
                    <td><span class="badge bg-success">Completed</span></td>
                </tr>
                <tr>
                    <td>#1026</td>
                    <td>Citra Lestari</td>
                    <td>Jeans Blue</td>
                    <td>Rp 450.000</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                </tr>
                <tr>
                    <td>#1027</td>
                    <td>Andi Wijaya</td>
                    <td>Sneakers White</td>
                    <td>Rp 750.000</td>
                    <td><span class="badge bg-success">Completed</span></td>
                </tr>
                <tr>
                    <td>#1028</td>
                    <td>Dewi Anggraini</td>
                    <td>Hoodie Gray</td>
                    <td>Rp 350.000</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection