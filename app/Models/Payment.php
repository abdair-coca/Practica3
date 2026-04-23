<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'method',
        'amount',
        'status',
        'paid_at'
    ];

    protected $casts = [
        'amount'=>'decimal:2',
        'paid_at'=>'datetime'
    ];

    /**
     * Relacion
     */
    public function order(): \Illuminate\database\eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
