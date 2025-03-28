<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'type',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
