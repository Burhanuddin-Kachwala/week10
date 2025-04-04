<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','slug'];

    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }
    

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
