<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'user_name',
        'phone_number',
        'email_id',
        'password_hash',
        'role'
    ];

    protected $casts = [
        'phone_number' => 'string',
        'password_hash' => 'string',
        'role' => 'string',
    ];

    protected $hidden = [
        'password_hash',
    ];

    public $timestamps = false;

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'user_id');
    }
}
