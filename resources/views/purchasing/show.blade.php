@extends('layout.main')

@section('title', 'Purchase Order Details')

@push('page-styles')
<style>
    /* Sembunyikan sidebar dan header saat mencetak */
    @media print {
        body { background-color: #fff; }
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
        .po-card {
            box-shadow: none !important;
            border: none !important;
        }
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Purchase Order #PO-2025-002</h1>
    <div class="btn-toolbar mb-2 mb-md-0 print-button-container">
        <button class="btn btn-sm btn-secondary" onclick="window.print()">
            <i class="bi bi-printer"></i>
            Print / Save as PDF
        </button>
    </div>
</div>

<div class="card po-card">
    <div class="card-body p-4 p-md-5">
        {{-- Header PO --}}
        <div class="row mb-4">
            <div class="col-6">
                <h3 class="mb-0">FASHION ADMIN</h3>
                <small>Jl. Admin No. 123<br>Jakarta, Indonesia</small>
            </div>
            <div class="col-6 text-end">
                <h2 class="mb-0 text-uppercase">Purchase Order</h2>
                <p class="mb-0"><span class="fw-bold">PO #:</span> PO-2025-002</p>
                <p class="mb-0"><span class="fw-bold">Date:</span> 2025-10-09</p>
            </div>
        </div>

        {{-- Info Supplier --}}
        <div class="row border-top pt-4 mb-4">
            <div class="col-6">
                <h5 class="mb-2">Supplier:</h5>
                <p class="mb-0"><strong>Supplier Bahan Kain</strong></p>
                <p class="mb-0">Jl. Supplier No. 789</p>
                <p class="mb-0">Surabaya, Indonesia</p>
            </div>
            <div class="col-6 text-end">
                <h5 class="mb-2">Status:</h5>
                <p class="mb-0"><strong><span class="badge bg-primary">Submitted</span></strong></p>
            </div>
        </div>

        {{-- Tabel Item --}}
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Product Description</th>
                        <th scope="col" class="text-end">Qty</th>
                        <th scope="col" class="text-end">Unit Cost</th>
                        <th scope="col" class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kain Katun per Meter</td>
                        <td class="text-end">200</td>
                        <td class="text-end">Rp 50.000</td>
                        <td class="text-end">Rp 10.000.000</td>
                    </tr>
                    <tr>
                        <td>Kain Denim per Meter</td>
                        <td class="text-end">100</td>
                        <td class="text-end">Rp 75.000</td>
                        <td class="text-end">Rp 7.500.000</td>
                    </tr>
                    <tr>
                        <td>Kancing Baju (lusin)</td>
                        <td class="text-end">500</td>
                        <td class="text-end">Rp 10.000</td>
                        <td class="text-end">Rp 5.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Kalkulasi Total --}}
        <div class="row">
            <div class="col-6">
                <p class="fw-bold">Notes:</p>
                <small>Mohon segera diproses. Terima kasih.</small>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Subtotal:</span>
                    <span>Rp 22.500.000</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fs-4">
                    <span class="fw-bold">TOTAL:</span>
                    <span class="fw-bold">Rp 22.500.000</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection