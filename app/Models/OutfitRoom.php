<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutfitRoom extends Model
{
    use HasFactory;

    protected $table = 'outfit_room';

    protected $fillable = [
        'outfit_id',
        'room_id'
    ];
}
