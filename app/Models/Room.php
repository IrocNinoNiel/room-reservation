<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'floor_number',
        'room_type',
        'room_number',
        'room_description',
        'room_status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
