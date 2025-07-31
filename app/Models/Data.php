<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Data extends Model
{
    protected $fillable = [
        'ip',
        'name',
        'email',
        'phone',
        "comment",
        "address",
        "document",
        "pod",
        "status",
        "user_id",
    ];

    protected $casts = [
        'document' => 'array',
        'pod' => 'array',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
