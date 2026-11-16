<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mark extends Model
{
 protected $fillable=['student_id','professor_id','subject_id','ct_mark','assignment_mark'];
 public function student(){return $this->belongsTo(Student::class);} public function professor(){return $this->belongsTo(Professor::class);} public function subject(){return $this->belongsTo(Subject::class);}
}
