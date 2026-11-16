<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $fillable = ['subject_code', 'subject_name', 'credit'];

    public function professors(): BelongsToMany { return $this->belongsToMany(Professor::class)->withTimestamps(); }
    public function projects(): HasMany { return $this->hasMany(Project::class); }
    public function marks(): HasMany { return $this->hasMany(Mark::class); }
    public function attendances(): HasMany { return $this->hasMany(Attendance::class); }
}
