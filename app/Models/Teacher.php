<?php

namespace App\Models;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    public function class()
   {
    //    return $this->hasOne(ClassRoom::class, 'teacher_id', 'id');
       return $this->hasOne(ClassRoom::class);
   }

   public function domicile()
   {
       return $this->belongsTo(Domicile::class, 'domicile_id', 'id');
   }
}
