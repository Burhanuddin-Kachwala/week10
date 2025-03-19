<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ['name', 'bio', 'slug', 'image'];

    /**
     * Get the books for the product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
