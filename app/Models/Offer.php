<?php

namespace App\Models;

use App\Http\Livewire\OpenWork;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'open_work_id',
        'user_id',
        'description',
        'num_day',
        'pric',
        'statu',
        'is_active',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function open_work()
    {
        return $this->belongsTo(Open_work::class);
    }
}
