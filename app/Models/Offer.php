<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'discount',
        'description',
    ];
        protected $hidden = [
            'created_at',
            'updated_at',
    ];
}
