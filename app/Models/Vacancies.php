<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Vacancies extends Model
{
    use HasFactory,LogsActivity;
    protected $table = 'vacancies';
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty();
    }
    
    public function getCompany(){
        return $this->hasMany('App\Models\Companies','id','company_id')->first();
    }
    public function getCategory(){
        return $this->hasMany('App\Models\Categories','id','category_id')->first();
    }
     
    
}

