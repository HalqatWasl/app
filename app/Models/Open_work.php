<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departement;
class Open_work extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'departement_id',
        'province_id',
        'directorate_id',
        'title',
        'description',
        'num_day',
        'pric',
        'address',
        'stage',
        'is_active',
    ];

    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function departement()
    {
            return $this->belongsTo(Departement::class);
    }

    public function province()
    {
            return $this->belongsTo(Province::class);
    }

    public function directorate()
    {
            return $this->belongsTo(Directorate::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
        
    }

    
}



