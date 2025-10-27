<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'subtotal', 'tax', 'total', 'kasir_id'];

    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    public function details()
    {
        return $this->hasMany(SalesDetail::class, 'sale_id');
    }

    // Fungsi helper: hitung total otomatis
    public function hitungTotal()
    {
        $this->subtotal = $this->details->sum('subtotal');
        $this->total = $this->subtotal + ($this->subtotal * ($this->tax / 100));
        $this->save();
    }
}