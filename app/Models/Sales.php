<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'total', 'kasir_id'];

    // Relasi ke kasir (user)
    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    // Relasi ke detail penjualan
    public function details()
    {
        return $this->hasMany(SalesDetail::class, 'sales_id');
    }
}
