<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function competences()
    {
        return $this->hasMany(Competence::class);
    }
}
