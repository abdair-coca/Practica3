<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];


    /**
     * Boot para crear el slug
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (Category $category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    
    /**
     * Relaciones
     */
    public function products(): \Illuminate\database\eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
