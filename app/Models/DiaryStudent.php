<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'diary_date_id', 'type', 'price','currency_type','bond_no','student_id'
    ];

    public function diaryDate()
    {
        # code...
        return $this->belongsTo(DiaryDate::class,'diary_date_id','id');
    }

    public function student()
    {
        # code...
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
