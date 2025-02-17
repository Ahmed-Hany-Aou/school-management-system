<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGrade extends Model
{
    use HasFactory;

    public function studentMarks()
    {
        return $this->hasMany(StudentMarks::class, 'grade_id', 'id');
    }
}
