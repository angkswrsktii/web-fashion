@extends('layout.main')

@section('title', 'Invoice Details')

@push('page-styles')
<style>
    /* Sembunyikan sidebar dan header saat mencetak */
    @media print {
        body {
            background-color: #fff;
        }
        #sidebar,
        header.navbar,
        .print-button-container {
            display: none !important;
        }
        main.col-md-9 {
            width: 100% !important;
            margin-left: 0 !important;
            padding: 0 !important;
        }
        .invoice-card {
            box-shadow: none !important;
            border: none !important;
        }
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Invoice #INV-002</h1>
    <div class="btn-toolbar mb-2 mb-md-0 print-button-container">
        <button class="btn btn-sm btn-secondary" onclick="window.print()">
            <i class="bi bi-printer"></i>
            Print / Save as PDF
        </button>
    </div>
</div>

<div class="card invoice-card">
    <div class="card-body p-4 p-md-5">
        {{-- Header Invoice --}}
        <div class="row mb-4">
            <div class="col-6">
                <h3 class="mb-0">FASHION ADMIN</h3>
                <small>Jl. Admin No. 123<br>Jakarta, Indonesia</small>
            </div>
            <div class="col-6 text-end">
                <h2 class="mb-0 text-uppercase">Invoice</h2>
                <p class="mb-0"><span class="fw-bold">Invoice #:</span> INV-002</p>
                <p class="mb-0"><span class="fw-bold">Date:</span> 2025-10-08</p>
            </div>
        </div>

        {{-- Info Customer & Perusahaan --}}
        <div class="row border-top pt-4 mb-4">
            <div class="col-6">
                <h5 class="mb-2">Bill To:</h5>
                <p class="mb-0"><strong>Citra Lestari</strong></p>
                <p class="mb-0">Jl. Pelanggan No. 456</p>
                <p class="mb-0">Bandung, Indonesia</p>
            </div>
            <div class="col-6 text-end">
                <h5 class="mb-2">Payment Details:</h5>
                <p class="mb-0"><strong>Status:</strong> <span class="badge bg-warning text-dark">Pending</span></p>
                <p class="mb-0"><strong>Due Date:</strong> 2025-10-15</p>
            </div>
        </div>

        {{-- Tabel Item --}}
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Item Description</th>
                        <th scope="col" class="text-end">Qty</th>
                        <th scope="col" class="text-end">Unit Price</th>
                        <th scope="col" class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jeans Blue (32)</td>
                        <td class="text-end">1</td>
                        <td class="text-end">Rp 450.000</td>
                        <td class="text-end">Rp 450.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Kalkulasi Total --}}
        <div class="row">
            <div class="col-6">
                <p class="fw-bold">Notes:</p>
                <small>Thank you for your business!</small>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Subtotal:</span>
                    <span>Rp 450.000</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Tax (11%):</span>
                    <span>Rp 49.500</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fs-4">
                    <span class="fw-bold">TOTAL:</span>
                    <span class="fw-bold">Rp 499.500</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection