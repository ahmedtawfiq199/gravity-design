<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,'id_number' ,'phone' ,'address' ,'second_phone'
    ];

    public function groups()
    {
        return $this->hasMany(Group::class ,'lecture_id' ,'id');
    }
}
