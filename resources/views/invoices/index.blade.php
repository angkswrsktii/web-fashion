@extends('layout.main')

@section('title', 'Invoices')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Invoices</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        {{-- Tombol 'Create New' bisa diarahkan ke POS atau form invoice manual --}}
        <a href="{{ route('pos.index') }}" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle"></i>
            Create New Invoice
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Invoice #</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Date</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh Data 1: Paid --}}
                    <tr>
                        <td>INV-001</td>
                        <td>Budi Santoso</td>
                        <td>2025-10-05</td>
                        <td>2025-10-12</td>
                        <td>Rp 150.000</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td>
                            <a href="{{ route('invoices.show') }}" class="btn btn-sm btn-outline-secondary">View</a>
                        </td>
                    </tr>
                    {{-- Contoh Data 2: Pending --}}
                    <tr>
                        <td>INV-002</td>
                        <td>Citra Lestari</td>
                        <td>2025-10-08</td>
                        <td>2025-10-15</td>
                        <td>Rp 450.000</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td>
                            <a href="{{ route('invoices.show') }}" class="btn btn-sm btn-outline-secondary">View</a>
                        </td>
                    </tr>
                    {{-- Contoh Data 3: Overdue --}}
                    <tr>
                        <td>INV-003</td>
                        <td>Andi Wijaya</td>
                        <td>2025-09-20</td>
                        <td>2025-09-27</td>
                        <td>Rp 750.000</td>
                        <td><span class="badge bg-danger">Overdue</span></td>
                        <td>
                            <a href="{{ route('invoices.show') }}" class="btn btn-sm btn-outline-secondary">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection