<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_programs','program_id','course_id','id','id');
    }
}
