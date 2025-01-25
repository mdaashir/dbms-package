<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SampleMenu extends Model
{
    use SoftDeletes;
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
