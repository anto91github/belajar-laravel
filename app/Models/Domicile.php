<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicile extends Model
{
    use HasFactory;
    protected $connection = 'mysql2'; 
    // atau
    // protected $table = 'mycode.domiciles';
}
