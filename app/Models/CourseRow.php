<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CourseRow extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    //specify which attributes are allowed to be mass assignment 
    protected $fillable = [
        'course_id',
        'courseOutline',
        'CO',
        'L',
        'T',
        'P',
        'O',
        'GuidedLearning',
        'IndependentLearning',
        'TotalSLT',
    ];

    public function course()
    {
        //related model's class name ('Course::class')
        //The foreign key column on the current model (course_id in CourseRow)
        //The primary key column on the related model (course_id in Course)
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}
