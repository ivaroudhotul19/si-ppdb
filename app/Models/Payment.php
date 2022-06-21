<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Payment extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function new_student(){
        return $this->belongsTo(NewStudent::class, 'student_id');
    }
}
