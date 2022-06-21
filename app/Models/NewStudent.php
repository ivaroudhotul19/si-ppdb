<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewStudent extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function registration(){
        return $this->hasOne(Registration::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function revocation(){
        return $this->hasOne(Revocation::class);
    }

    public function major(){
        return $this->belongsTo(Major::class, 'major_id');
    }
}
