@extends('layout.main')

@section('title', 'Purchase Orders')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Purchase Orders</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('purchasing.create') }}" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle"></i>
            Create New PO
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">PO Number</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh Data --}}
                    <tr>
                        <td>PO-2025-001</td>
                        <td>Supplier Garmentindo</td>
                        <td>2025-10-08</td>
                        <td>Rp 15.000.000</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td><a href="{{ route('purchasing.show') }}" class="btn btn-sm btn-outline-secondary">View Details</a></td>
                    </tr>
                    <tr>
                        <td>PO-2025-002</td>
                        <td>Supplier Bahan Kain</td>
                        <td>2025-10-09</td>
                        <td>Rp 22.500.000</td>
                        <td><span class="badge bg-primary">Submitted</span></td>
                        <td><a href="{{ route('purchasing.show') }}" class="btn btn-sm btn-outline-secondary">View Details</a></td>
                    </tr>
                    <tr>
                        <td>PO-2025-003</td>
                        <td>Supplier Garmentindo</td>
                        <td>2025-10-10</td>
                        <td>Rp 7.800.000</td>
                        <td><span class="badge bg-warning text-dark">Draft</span></td>
                        <td><a href="{{ route('purchasing.show') }}" class="btn btn-sm btn-outline-secondary">View Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection