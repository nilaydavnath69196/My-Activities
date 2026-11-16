<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Model
{
    protected $fillable = ['user_id', 'professor_id', 'name', 'department', 'email', 'phone'];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function subjects(): BelongsToMany { return $this->belongsToMany(Subject::class)->withTimestamps(); }
    public function projects(): HasMany { return $this->hasMany(Project::class); }
    public function marks(): HasMany { return $this->hasMany(Mark::class); }
    public function attendances(): HasMany { return $this->hasMany(Attendance::class); }
}
