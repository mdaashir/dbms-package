<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';

    protected $primaryKey = 'bill_number';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cart_id',
        'user_id',
        'total_price',
        'date',
        'by_user'
    ];

    protected $casts = [
        'total_price' => 'float',
        'date' => 'date'
    ];

    public $timestamps = false;

    // Define relationships
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setTotalPriceAttribute($value): void
    {
        if (!$this->relationLoaded('cart')) {
            $this->load('cart');
        }

        $this->attributes['total_price'] = $this->cart->price;
    }
}
