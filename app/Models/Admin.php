<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    // protected $guard = 'admin';



    protected $table = 'admins';

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'role_id'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
