<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AssignmentSubmission extends Model
{
    protected $fillable = ['assignment_post_id','student_id','file_path','status','feedback'];
    public function assignment(): BelongsTo { return $this->belongsTo(AssignmentPost::class, 'assignment_post_id'); }
    public function student(): BelongsTo { return $this->belongsTo(Student::class); }
}
