<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseCode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'title', 'users_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * code nas a user id
     */
    public function user(){
        return$this->hasOne(User::class, 'id', 'users_id');
    }

}
