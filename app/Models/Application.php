<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function candidate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Candidate::class)->withDefault();
    }

    public function job(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Job::class)->withDefault();
    }

    public function applicationCompetences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ApplicationCompetence::class);
    }

    public function getReferralValueAttribute()
    {
        return $this->applicationCompetences->map(function ($item) {
            return $item->level->factor * $item->competence->height;
        })->sum();
    }
}
