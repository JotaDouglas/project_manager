<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TenantModel;

class Task extends TenantModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id',
        'company_id',
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    // Relacionamento
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
