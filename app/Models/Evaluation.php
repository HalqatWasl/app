<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'user_id_eval',
        'evaluation',
        'comment',
        'reply_to_comment',


    ];
}
