<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class AssignmentPost extends Model
{
    protected $fillable = ['professor_id','subject_id','title','description','due_at'];
    protected $casts = ['due_at' => 'datetime'];
    public function professor(): BelongsTo { return $this->belongsTo(Professor::class); }
    public function subject(): BelongsTo { return $this->belongsTo(Subject::class); }
    public function submissions(): HasMany { return $this->hasMany(AssignmentSubmission::class); }
}
