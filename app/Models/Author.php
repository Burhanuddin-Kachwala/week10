<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'bio', 'slug', 'image'];

    /**
     * Get the books for the product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
