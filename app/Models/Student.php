<?php

namespace App\Models;

use App\Models\Ekskul;
use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'nis', 'gender', 'class_id','image'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }

    
    public function ekskul()
    {
        return $this->belongsToMany(Ekskul::class, 'student_ekskul', 'student_id', 'ekskul_id');
    }

}
