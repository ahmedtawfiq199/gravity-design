<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'price','description',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class,'course_ud','id');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class,'course_programs','course_id','program_id','id','id');
    }
}
