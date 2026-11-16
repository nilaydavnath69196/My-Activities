<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Attendance extends Model
{
 protected $fillable=['student_id','professor_id','subject_id','total_classes','present','absent','percentage'];
 public function student(){return $this->belongsTo(Student::class);} public function professor(){return $this->belongsTo(Professor::class);} public function subject(){return $this->belongsTo(Subject::class);}
}
