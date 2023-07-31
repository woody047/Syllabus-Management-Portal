<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    //laravel will indicates that thers is no 'id' column in the course table
    //so it will assumes the primary key column in the table is named 'id' instead of 'course_id'
    //so we need to set protected primary key for course_id
    protected $primaryKey = 'course_id';

    //a course belongs to one user
    public function getUser(){
        return $this->belongsTo(User::class);
    }

    // public function auditLogs(){
    //     return $this->hasMany(Audit::class,'course_id');
    // }
}