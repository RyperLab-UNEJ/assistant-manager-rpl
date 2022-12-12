<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionLevel extends Model
{
    use HasFactory;

    protected $table = 'competition_levels';

    protected $fillable = [
        'level_name'
    ];
}
