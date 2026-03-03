<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Scopes\CompanyScope;

class TenantModel extends Model
{
    protected static function booted() {
        static::addGlobalScope(new CompanyScope);
    }
}
