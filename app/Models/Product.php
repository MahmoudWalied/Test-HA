<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'minimum_stock',
        'supplier_id'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'minimum_stock' => 'integer',
        'price' => 'decimal:2'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function needsRestock()
    {
        return $this->quantity < $this->minimum_stock;
    }
}
