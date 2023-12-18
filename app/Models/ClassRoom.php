<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory;
    protected $table = 'class';

    public function student()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }

    
    public function homeRoomTeacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    
}
