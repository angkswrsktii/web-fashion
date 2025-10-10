@extends('layout.main')

@section('title', 'Point of Sale')

@push('page-styles')
{{-- CSS Khusus untuk halaman POS --}}
<style>
    /* Membuat layout POS full-height */
    .pos-container {
        display: flex;
        height: calc(100vh - 56px); /* 56px adalah tinggi header */
    }

    /* Bagian daftar produk */
    .product-list {
        flex-grow: 1;
        overflow-y: auto;
        padding: 1.5rem;
    }

    .product-card {
        cursor: pointer;
        transition: transform 0.1s ease-in-out, box-shadow 0.1s ease-in-out;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Bagian keranjang/tagihan */
    .cart-section {
        flex-basis: 400px;
        flex-shrink: 0;
        background-color: #f8f9fa;
        border-left: 1px solid #dee2e6;
        display: flex;
        flex-direction: column;
    }

    .cart-items {
        flex-grow: 1;
        overflow-y: auto;
        padding: 1rem;
    }

    .cart-summary {
        padding: 1rem;
        border-top: 1px solid #dee2e6;
    }

    .quantity-controls button {
        width: 30px;
    }
    .quantity-controls input {
        width: 40px;
        text-align: center;
    }
</style>
@endpush

@section('content')
<div class="pos-container">
    {{-- KIRI: DAFTAR PRODUK --}}
    <div class="product-list">
        {{-- Header & Search --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4">Products</h2>
            <div class="w-50">
                <input type="text" class="form-control" placeholder="Search products...">
            </div>
        </div>

        {{-- Filter Kategori --}}
        <div class="mb-4">
            <button class="btn btn-outline-secondary btn-sm">All</button>
            <button class="btn btn-outline-secondary btn-sm">T-Shirts</button>
            <button class="btn btn-outline-secondary btn-sm">Jeans</button>
            <button class="btn btn-outline-secondary btn-sm">Hoodies</button>
            <button class="btn btn-outline-secondary btn-sm">Sneakers</button>
        </div>

        {{-- Grid Produk (Contoh Data) --}}
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4" id="product-grid">
            <div class="col" onclick="addToCart('T-Shirt Black', 150000)">
                <div class="card h-100 product-card">
                    <img src="https://via.placeholder.com/150/000000/FFFFFF?text=Fashion" class="card-img-top" alt="T-Shirt Black">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-1">T-Shirt Black</h6>
                        <p class="card-text fw-bold">Rp 150.000</p>
                    </div>
                </div>
            </div>
            <div class="col" onclick="addToCart('Jeans Blue', 450000)">
                <div class="card h-100 product-card">
                    <img src="https://via.placeholder.com/150/0000FF/FFFFFF?text=Fashion" class="card-img-top" alt="Jeans Blue">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-1">Jeans Blue</h6>
                        <p class="card-text fw-bold">Rp 450.000</p>
                    </div>
                </div>
            </div>
             <div class="col" onclick="addToCart('Sneakers White', 750000)">
                <div class="card h-100 product-card">
                    <img src="https://via.placeholder.com/150/FFFFFF/000000?text=Fashion" class="card-img-top" alt="Sneakers White">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-1">Sneakers White</h6>
                        <p class="card-text fw-bold">Rp 750.000</p>
                    </div>
                </div>
            </div>
             <div class="col" onclick="addToCart('Hoodie Gray', 350000)">
                <div class="card h-100 product-card">
                    <img src="https://via.placeholder.com/150/808080/FFFFFF?text=Fashion" class="card-img-top" alt="Hoodie Gray">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-1">Hoodie Gray</h6>
                        <p class="card-text fw-bold">Rp 350.000</p>
                    </div>
                </div>
            </div>
            </div>
    </div>

    {{-- KANAN: KERANJANG / TAGIHAN --}}
    <div class="cart-section">
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <h5 class="mb-0">Current Order</h5>
            <button class="btn btn-danger btn-sm" onclick="clearCart()">Clear All</button>
        </div>

        {{-- Daftar Item di Keranjang --}}
        <div class="cart-items" id="cart-items">
            <div class="text-center text-muted mt-4">
                <p>Your cart is empty</p>
                <i class="bi bi-cart-x" style="font-size: 4rem;"></i>
            </div>
        </div>

        {{-- Ringkasan dan Pembayaran --}}
        <div class="cart-summary">
            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal</span>
                <span id="cart-subtotal">Rp 0</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Tax (11%)</span>
                <span id="cart-tax">Rp 0</span>
            </div>
             <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Total</span>
                <span id="cart-total">Rp 0</span>
            </div>
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-primary btn-lg" onclick="processPayment()">Process Payment</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
<script>
    // Inisialisasi keranjang belanja
    let cart = {};
    const TAX_RATE = 0.11;

    // Fungsi untuk memformat angka menjadi Rupiah
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    }

    // Fungsi untuk menambahkan produk ke keranjang
    function addToCart(productName, price) {
        if (cart[productName]) {
            // Jika produk sudah ada, tambah jumlahnya
            cart[productName].quantity++;
        } else {
            // Jika produk baru, tambahkan ke keranjang
            cart[productName] = {
                price: price,
                quantity: 1
            };
        }
        updateCart();
    }
    
    // Fungsi untuk mengubah jumlah produk
    function changeQuantity(productName, amount) {
        if (cart[productName]) {
            cart[productName].quantity += amount;
            if (cart[productName].quantity <= 0) {
                // Hapus produk jika jumlahnya 0 atau kurang
                delete cart[productName];
            }
        }
        updateCart();
    }
    
    // Fungsi untuk menghapus semua isi keranjang
    function clearCart() {
        if(confirm('Are you sure you want to clear the cart?')) {
            cart = {};
            updateCart();
        }
    }

    // Fungsi utama untuk memperbarui tampilan keranjang
    function updateCart() {
        const cartItemsContainer = $('#cart-items');
        cartItemsContainer.empty();

        let subtotal = 0;

        // Cek jika keranjang kosong
        if (Object.keys(cart).length === 0) {
            cartItemsContainer.html(`
                <div class="text-center text-muted mt-4">
                    <p>Your cart is empty</p>
                    <i class="bi bi-cart-x" style="font-size: 4rem;"></i>
                </div>
            `);
        } else {
            for (const productName in cart) {
                const item = cart[productName];
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;

                const itemElement = `
                    <div class="card mb-2">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">${productName}</h6>
                                    <small class="text-muted">${formatRupiah(item.price)}</small>
                                </div>
                                <div class="d-flex align-items-center quantity-controls">
                                    <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('${productName}', -1)">-</button>
                                    <input type="text" class="form-control form-control-sm mx-1" value="${item.quantity}" readonly>
                                    <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('${productName}', 1)">+</button>
                                </div>
                                <span class="fw-bold">${formatRupiah(itemTotal)}</span>
                            </div>
                        </div>
                    </div>
                `;
                cartItemsContainer.append(itemElement);
            }
        }
        
        const tax = subtotal * TAX_RATE;
        const total = subtotal + tax;
        
        // Update ringkasan total
        $('#cart-subtotal').text(formatRupiah(subtotal));
        $('#cart-tax').text(formatRupiah(tax));
        $('#cart-total').text(formatRupiah(total));
    }
    
    function processPayment() {
        if (Object.keys(cart).length === 0) {
            alert('Cart is empty!');
            return;
        }
        const total = $('#cart-total').text();
        alert(`Processing payment for ${total}.\n(Ini hanya demonstrasi)`);
        // Di aplikasi nyata, di sini Anda akan memproses payment gateway, mencetak struk, dll.
        cart = {}; // Kosongkan keranjang setelah pembayaran
        updateCart();
    }

    // Panggil updateCart() saat halaman pertama kali dimuat
    $(document).ready(function() {
        updateCart();
    });
</script>
@endpush