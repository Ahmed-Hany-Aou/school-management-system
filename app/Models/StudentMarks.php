<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function assign_subject(){
        return $this->belongsTo(AssignSubject::class, 'assign_subject_id', 'id');
    }

    public function year(){
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }

    public function student_class(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function exam_type(){
        return $this->belongsTo(ExamType::class, 'exam_type_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(SchoolSubject::class, 'subject_id', 'id');
    }

    public function grade(){
        return $this->belongsTo(MarksGrade::class, 'grade_id', 'id');
    }
}
