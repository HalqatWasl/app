<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'province_id',
        'name',
        'is_active',
    ];

    public function province()
    {
            return $this->belongsTo(Province::class);
    }
}
