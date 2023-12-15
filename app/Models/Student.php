<?php

namespace App\Models;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'nis', 'gender', 'class_id'];

    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }

}
