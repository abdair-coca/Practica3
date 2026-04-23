<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'decimal:2'
    ];

    /**
     * Accessor
     */
    protected function subTotal(): Attribute
    {
        return Attribute::make(
            get: fn() => 'Bs ' . number_format($this->unit_price * $this->quantity, 2)
        );
    }

    /**
     * Relaciones
     */
    public function product(): \Illuminate\database\eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function order(): \Illuminate\database\eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
