<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekskul extends Model
{
    use HasFactory;
    protected $table = 'ekskuls';

    /**
     * The roles that belong to the Ekskul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_ekskul', 'ekskul_id', 'student_id');
    }
}
