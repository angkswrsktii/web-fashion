@extends('layout.main')

@section('title', 'Create Purchase Order')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Purchase Order</h1>
</div>

<div class="card">
    <div class="card-body">
        <form>
            {{-- Bagian Atas: Info Supplier dan Tanggal --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="supplier" class="form-label">Supplier</label>
                    <select class="form-select" id="supplier">
                        <option selected>Choose supplier...</option>
                        <option value="1">Supplier Garmentindo</option>
                        <option value="2">Supplier Bahan Kain</option>
                        <option value="3">Supplier Aksesoris Fashion</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="order-date" class="form-label">Order Date</label>
                    <input type="date" class="form-control" id="order-date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status">
                        <option value="draft" selected>Draft</option>
                        <option value="submitted">Submitted</option>
                    </select>
                </div>
            </div>

            {{-- Bagian Tengah: Tambah Item --}}
            <div class="card mb-4">
                <div class="card-header">Add Items to Order</div>
                <div class="card-body">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label for="product" class="form-label">Product</label>
                            <select id="product" class="form-select">
                                <option data-price="50000" value="Kain Katun per Meter">Kain Katun per Meter</option>
                                <option data-price="75000" value="Kain Denim per Meter">Kain Denim per Meter</option>
                                <option data-price="10000" value="Kancing Baju (lusin)">Kancing Baju (lusin)</option>
                                <option data-price="25000" value="Resleting (lusin)">Resleting (lusin)</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" value="1">
                        </div>
                        <div class="col-md-3">
                            <label for="cost" class="form-label">Cost per Item (Rp)</label>
                            <input type="number" class="form-control" id="cost" placeholder="Cost">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-secondary w-100" id="add-item-btn">Add Item</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Item yang Ditambahkan --}}
            <h5 class="mb-3">Order Items</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Cost per Item</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="po-items-body">
                        </tbody>
                </table>
            </div>

            {{-- Bagian Bawah: Ringkasan Total --}}
            <div class="row mt-4">
                <div class="col-md-6 offset-md-6">
                    <div class="d-flex justify-content-between">
                        <h5>Subtotal</h5>
                        <h5 id="subtotal-display">Rp 0</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Total</h4>
                        <h4 id="total-display">Rp 0</h4>
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2">Save as Draft</button>
                <button type="submit" class="btn btn-primary">Submit Purchase Order</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('page-scripts')
<script>
    let purchaseItems = [];

    // Fungsi format Rupiah
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency', currency: 'IDR', minimumFractionDigits: 0
        }).format(number);
    }

    // Set cost field when product changes
    $('#product').on('change', function() {
        const selectedPrice = $(this).find('option:selected').data('price');
        $('#cost').val(selectedPrice);
    }).trigger('change');

    // Event handler untuk tombol "Add Item"
    $('#add-item-btn').on('click', function() {
        const productSelect = $('#product');
        const productName = productSelect.val();
        const quantity = parseInt($('#quantity').val());
        const cost = parseFloat($('#cost').val());

        if (productName && quantity > 0 && cost > 0) {
            purchaseItems.push({
                name: productName,
                quantity: quantity,
                cost: cost
            });
            updatePoTable();
            // Reset input fields
            $('#quantity').val(1);
        } else {
            alert('Please fill all item fields correctly.');
        }
    });

    // Fungsi untuk menghapus item dari list
    function removeItem(index) {
        purchaseItems.splice(index, 1);
        updatePoTable();
    }

    // Fungsi untuk render ulang table dan total
    function updatePoTable() {
        const tableBody = $('#po-items-body');
        tableBody.empty();
        let subtotal = 0;

        purchaseItems.forEach((item, index) => {
            const itemTotal = item.quantity * item.cost;
            subtotal += itemTotal;
            const row = `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td>${formatRupiah(item.cost)}</td>
                    <td>${formatRupiah(itemTotal)}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(${index})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            tableBody.append(row);
        });

        $('#subtotal-display').text(formatRupiah(subtotal));
        $('#total-display').text(formatRupiah(subtotal)); // Asumsi total = subtotal
    }
</script>
@endpush