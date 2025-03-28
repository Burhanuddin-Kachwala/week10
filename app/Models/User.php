<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;
   

    protected $fillable = ['name', 'email', 'password'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // public function reviews(): HasMany
    // {
    //     return $this->hasMany(Review::class);
    // }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
