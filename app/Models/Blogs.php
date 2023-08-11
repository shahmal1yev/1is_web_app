<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Blogs extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'blogs';
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty();
    }
    
    public function getUser(){
        return $this->hasMany('App\Models\User', 'id', 'user_id')->first();
    }
}
