@extends('layout.main')

@section('title', 'Reports')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Reports</h1>
</div>

{{-- Filter Tanggal --}}
<div class="card mb-4">
    <div class="card-body">
        <form>
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" value="{{ date('Y-m-d', strtotime('-30 days')) }}">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Generate Report</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Ringkasan KPI (Key Performance Indicators) --}}
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Total Revenue</h5>
                <p class="card-text fs-4">Rp 15.750.000</p>
                <small>(For selected period)</small>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <p class="card-text fs-4">132</p>
                <small>(For selected period)</small>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Avg. Order Value</h5>
                <p class="card-text fs-4">Rp 119.318</p>
                <small>(For selected period)</small>
            </div>
        </div>
    </div>
</div>

{{-- Grafik dan Laporan Tabel --}}
<div class="row">
    {{-- Grafik Penjualan --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Sales Trend
            </div>
            <div class="card-body">
                {{-- Ini adalah tempat Chart.js akan menggambar grafik --}}
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Laporan Produk Terlaris --}}
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Top Selling Products
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Units Sold</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>T-Shirt Black (M)</td>
                            <td>45</td>
                        </tr>
                        <tr>
                            <td>Sneakers White (42)</td>
                            <td>32</td>
                        </tr>
                        <tr>
                            <td>Jeans Blue (32)</td>
                            <td>28</td>
                        </tr>
                        <tr>
                            <td>Hoodie Gray (L)</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>T-Shirt Black (L)</td>
                            <td>15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
{{-- Memuat library Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Script untuk membuat grafik penjualan (contoh data)
    $(document).ready(function() {
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line', // Tipe grafik: line, bar, pie, dll.
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Label sumbu X
                datasets: [{
                    label: 'Sales Revenue (IDR)',
                    data: [3500000, 5200000, 4100000, 2950000], // Data sumbu Y
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            // Format label Y sebagai Rupiah
                            callback: function(value, index, values) {
                                return new Intl.NumberFormat('id-ID', { 
                                    style: 'currency', 
                                    currency: 'IDR',
                                    minimumFractionDigits: 0 
                                }).format(value);
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush