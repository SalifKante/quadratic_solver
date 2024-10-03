<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuadraticSolution extends Model
{
    use HasFactory;
    protected $fillable = ['a', 'b', 'c', 'x1', 'x2'];

}
