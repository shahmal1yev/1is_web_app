<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Companies extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'companies';
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty();
    }

    public function getUser(){
        return $this->hasMany('App\Models\User', 'id', 'user_id')->get()->first();
    }
    public function getSector(){
        return $this->hasMany('App\Models\Sectors', 'id', 'sector_id')->first();
    }
    public function getVacancy(){
        return $this->hasMany('App\Models\Vacancies','company_id','id')->get();
    }
}
