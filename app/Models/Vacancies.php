<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Vacancies extends Model
{
    use HasFactory,LogsActivity;
    protected $table = 'vacancies';
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['user_id', 'category_id', 'id', 'city_id', 'village_id', 'company_id', 'education_id', 'experience_id', 'job_type_id', 'position', 'salary_type', 'slug', 'min_salary', 'max_salary', 'min_age', 'max_age', 'requirement', 'description', 'contact_name', 'accept_type', 'contact_info', 'deadline', 'status'])
            ->logOnlyDirty();
    }

    
    public function getCompany(){
        return $this->hasMany('App\Models\Companies','id','company_id')->first();
    }
    public function getCategory(){
        return $this->hasMany('App\Models\Categories','id','category_id')->first();
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}

