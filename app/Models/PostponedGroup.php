<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostponedGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id','note'
    ];

    public function student()
    {
        # code...
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
