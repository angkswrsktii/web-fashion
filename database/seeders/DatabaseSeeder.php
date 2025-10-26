<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetail;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🧍 USERS
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        $kasir = User::create([
            'username' => 'kasir',
            'email' => 'kasir@example.com',
            'password' => Hash::make('password123'),
            'role' => 'kasir',
        ]);

        // 🚚 SUPPLIERS
        $supplier1 = Supplier::create([
            'name' => 'PT Fashion Indo',
            'address' => 'Jl. Merdeka No. 10, Bandung',
            'contact' => '081234567890',
        ]);

        $supplier2 = Supplier::create([
            'name' => 'PT Trendy Apparel',
            'address' => 'Jl. Sudirman No. 55, Jakarta',
            'contact' => '089876543210',
        ]);

        // 👕 PRODUCTS
        $product1 = Product::create([
            'kode_product' => 'PRD001',
            'name' => 'T-Shirt Black',
            'category' => 'T-Shirts',
            'status' => 'active',
            'deskripsi' => 'Kaos hitam polos ukuran all size',
            'stock' => 100,
            'price' => 150000,
            'image' => 'tshirt_black.jpg',
            'supplier_id' => $supplier1->id,
        ]);

        $product2 = Product::create([
            'kode_product' => 'PRD002',
            'name' => 'Jeans Blue',
            'category' => 'Jeans',
            'status' => 'active',
            'deskripsi' => 'Celana jeans warna biru',
            'stock' => 50,
            'price' => 450000,
            'image' => 'jeans_blue.jpg',
            'supplier_id' => $supplier2->id,
        ]);

        $product3 = Product::create([
            'kode_product' => 'PRD003',
            'name' => 'Sneakers White',
            'category' => 'Sneakers',
            'status' => 'active',
            'deskripsi' => 'Sepatu sneakers putih unisex',
            'stock' => 30,
            'price' => 750000,
            'image' => 'sneakers_white.jpg',
            'supplier_id' => $supplier1->id,
        ]);

        // 🧾 SALES
        $sale = Sales::create([
            'tanggal' => now(),
            'subtotal' => 450000, // sebelum pajak
            'tax' => 11.00,
            'total' => 450000 + (450000 * 0.11), // setelah pajak
            'kasir_id' => $kasir->id,
        ]);

        // 📦 SALES DETAIL
        SalesDetail::create([
            'sale_id' => $sale->id,
            'product_id' => $product2->id, // Jeans Blue
            'quantity' => 1,
            'subtotal' => 450000,
        ]);
    }
}