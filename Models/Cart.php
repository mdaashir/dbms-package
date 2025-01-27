<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $primaryKey = 'cart_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'food_id',
        'quantity',
        'price',
        'date',
        'time'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'float',
        'date' => 'date',
        'time' => 'string'
    ];

    public $timestamps = false;

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function foodItem()
    {
        return $this->belongsTo(SampleMenu::class, 'food_id');
    }

    public function setPriceAttribute($value): void
    {
        if (!$this->relationLoaded('foodItem')) {
            $this->load('foodItem');
        }

        $this->attributes['price'] = $this->foodItem->price * $this->quantity;
    }
}
