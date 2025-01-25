<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleMenu extends Model
{
    protected $table = 'sample_menu';

    protected $fillable = [
        'food_items',
        'is_breakfast',
        'is_lunch',
        'is_dinner',
        'is_veg',
        'description',
        'price',
        'picture'
    ];

    protected $casts = [
        'is_breakfast' => 'boolean',
        'is_lunch' => 'boolean',
        'is_dinner' => 'boolean',
        'is_veg' => 'boolean',
        'price' => 'float',
    ];

    public $timestamps = false;

    public function carts()
    {
        return $this->hasMany(Cart::class, 'food_id');
    }
}
