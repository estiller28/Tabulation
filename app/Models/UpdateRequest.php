<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'id_number',
        'status',
        'reason',
        'dogs_id'
    ];

    public function dogs(){
        return $this->belongsTo(Dogs::class);
    }
}
