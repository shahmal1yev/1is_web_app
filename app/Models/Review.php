<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $guarded = [];

    public function getCompany(){
        return $this->hasMany('App\Models\Companies','id','company_id')->first();
    }

    public function getUser(){
        return $this->hasMany('App\Models\User', 'id', 'user_id')->first();
    }

}
