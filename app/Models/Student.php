<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'first_name',
        'father_name',
        'grandfather_name',
        'last_name',
        'state',
        'address',
        'social_status',
        'college',
        'specialization',
        'gender',
        'date_of_birth',
        'age',
        'qualification',
        'telephone_number',
        'mobile_number',
        'identification',
        'right_time',
        'trining_day',
        'trining_time',
        'how_to_know_us',
        'previous_courses',
        'courses',
        'status',
        'group_id',
        'full_name'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function diaryStudents()
    {
        # code...
        return $this->hasMany(DiaryStudent::class,'student_id','id');
    }

    public function postponedGroup()
    {
        # code...
        return $this->hasOne(PostponedGroup::class,'student_id','id');
    }
}
