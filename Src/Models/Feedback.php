<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $primaryKey = 'email_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_name',
        'email_id',
        'profession',
        'messages',
        'picture',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public $timestamps = false;
}
