<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_product')->unique(); // kode unik produk
            $table->string('name'); // nama produk
            $table->string('category')->nullable(); // kategori
            $table->string('status')->default('active'); // active / inactive
            $table->text('deskripsi')->nullable(); // deskripsi produk
            $table->integer('stock')->default(0); // stok
            $table->decimal('price', 12, 2); // harga
            $table->string('image')->nullable(); // nama file / URL gambar
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade'); // relasi ke supplier
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('products');
    }
};