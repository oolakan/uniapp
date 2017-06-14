<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{

    /***
     * @var array
     *  The attributes that are mass assignable.
     */
    protected $fillable = [
        'course_file_name',  'course_file_url', 'users_id', 'course_codes_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * course material belong to a course code
     */
    public function code(){
        return $this->hasOne(CourseCode::class, 'id', 'course_codes_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * course material has one user
     */
    public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }
}
