<?php

namespace App\Models;

use App\Models\TenantModel;
use App\Models\Scopes\CompanyScope;

class Project extends TenantModel
{
    protected $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
