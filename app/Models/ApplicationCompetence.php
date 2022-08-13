<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationCompetence extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(Application::class)->withDefault();
    }

    public function level()
    {
        return $this->belongsTo(Level::class)->withDefault();
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class)->withDefault();
    }
}
