<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class)->withDefault();
    }

    public function job()
    {
        return $this->belongsTo(Job::class)->withDefault();
    }

    public function applicationCompetences()
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
