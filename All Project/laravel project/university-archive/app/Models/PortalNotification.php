<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PortalNotification extends Model
{
    protected $fillable = ['recipient_type','recipient_id','title','message','url','read_at'];
    protected $casts = ['read_at' => 'datetime'];
}
