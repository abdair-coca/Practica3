<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'description',
        'price',
        'stock',
        'active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'active' => 'boolean'
    ];

     /**
     * Boot para crear el sku
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (Product $product) {
            if (empty($product->slug)) {
                $product->sku = Str::slug($product->name);
            }
        });
    }

    /**accessor */
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn() => 'Bs. ' . number_format($this->price, 2)
        );
    }

    /**
     * Relaciones
     */
    public function category(): \Illuminate\database\eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity', 'unit_price');
    }
}
