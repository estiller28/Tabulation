<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'candidate_number',
        'is_removed',
    ];

    public function scores(){
        return $this->hasMany(Score::class, 'candidate_id', 'id');
    }
}
