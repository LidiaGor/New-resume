<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResumeRow extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
