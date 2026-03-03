<?php

namespace App\Models;

use App\Models\TenantModel;


class Company extends TenantModel
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    protected $fillable = [
        'name',
        'slug'
    ];
}
