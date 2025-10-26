<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('subtotal', 12, 2)->default(0); // sebelum pajak
            $table->decimal('tax', 5, 2)->default(11); // misal 11% pajak default
            $table->decimal('total', 12, 2)->default(0); // setelah pajak
            $table->foreignId('kasir_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};