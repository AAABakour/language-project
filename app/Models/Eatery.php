<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eatery extends Model
{
    use HasFactory;
    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'location',
        'description',
        'requests_count',
    ];
    protected $hidden = [
            'created_at',
            'updated_at',
    ];
    // Increment the request count
    public function incrementRequestCount()
    {
        $this->increment('requests_count');
    }
}
