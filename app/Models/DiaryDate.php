<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'date'
    ];

    public function diaryStudents()
    {
        # code...
        return $this->hasMany(DiaryStudent::class,'diary_date_id','id');
    }

    public function diaryClients()
    {
        # code...
        return $this->hasMany(DiaryClient::class,'diary_date_id','id');
    }
}
