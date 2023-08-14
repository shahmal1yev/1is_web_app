<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Cv extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'cv';
    protected $guarded = [];
    protected $fillable = ['portfolio'];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty();
    }

    public function getCategory(){
        return $this->hasMany('App\Models\Categories','id','category_id')->first();
    }
    public function getUser(){
        return $this->hasMany('App\Models\User', 'id', 'user_id')->first();
    }
}
