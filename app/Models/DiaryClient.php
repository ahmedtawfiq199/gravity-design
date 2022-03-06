<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'diary_date_id', 'type', 'price','currency_type','bond_no','statment'
    ];

    public function diaryDate()
    {
        # code...
        return $this->belongsTo(DiaryDate::class,'diary_date_id','id');
    }
}
