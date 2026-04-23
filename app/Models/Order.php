<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status',
        'total',
        'notes',
        'ordered_at'
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'ordered_at' => 'datetime'
    ];

    /**
     * Accessor
     */
    protected function getTotalConvertAttribute(): Attribute
    {
        return Attribute::make(
            get: fn() => 'Bs' . number_format($this->total, 2)
        );
    }

    /**
     * Relaciones
     */
    public function customer(): \Illuminate\database\eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): \Illuminate\database\eloquent\Relations\hasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment(): \Illuminate\database\eloquent\Relations\hasOne
    {
        return $this->hasOne(Payment::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('quantity', 'unit_price');
    }
}
