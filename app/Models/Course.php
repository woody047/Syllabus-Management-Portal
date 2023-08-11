<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Auditable (AuditableContract) trait 
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model implements AuditableContract
{

    use \OwenIt\Auditing\Auditable;
    use HasFactory,SoftDeletes;
    //laravel will indicates that thers is no 'id' column in the course table
    //so it will assumes the primary key column in the table is named 'id' instead of 'course_id'
    //so we need to set protected primary key for course_id
    protected $primaryKey = 'course_id';

    //a course belongs to one user
    public function getUser(){
        return $this->belongsTo(User::class);
    }

    //specifies the foreign key column name to ensure the relationship with the 'courseRows' model is correctly defined
    public function courseRows()
    {
        return $this->hasMany(CourseRow::class,'course_id','course_id');
    }

    public function infoOnPracRows(){
        return $this->hasMany(InfoOnPracRow::class,'course_id','course_id');
    }
}