<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'dep_id',
        'titel',
        'description',
        'images',
        'dep_types',
        'is_active',
    ];

    public function user()
    {
            return $this->belongsTo(User::class);
    }
}
