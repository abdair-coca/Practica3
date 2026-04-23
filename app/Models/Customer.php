<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address'
    ];

    /**
     * Accessor
     */
    protected function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
    /**
     * Relaciones
     */
    public function orders(): \Illuminate\database\eloquent\Relations\hasMany
    {
        return $this->hasMany(Order::class);
    }
}
