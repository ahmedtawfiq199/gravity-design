<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name' ,'course_id' ,'trining_day' ,'trining_time' ,'date_of_end', 'lecture_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class,'lecture_id','id');
    }

    public function students()
    {
        return $this->hasMany(Student::class,'group_id','id');
    }
}
