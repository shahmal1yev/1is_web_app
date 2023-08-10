<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\User;
use App\Models\Companies;

class Trainings extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'trainings';
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty();
    }

    public function getCompany(){
        return $this->hasMany('App\Models\Companies','id','company_id')->get()->first();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function company(): BelongsTo
    {
        return $this->belongsTo(Companies::class);
    }

}
