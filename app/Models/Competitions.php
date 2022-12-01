<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    use HasFactory;

    protected $table = 'competitions';

    protected $fillable = [
        'participant_id',
        'competition_level_id',
        'competition_name',
        'begin_date',
        'end_date',
        'status' // 0,1
    ];

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
