<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    use HasFactory;
    protected $fillable = ['postblog_id', 'user_id', 'content'];
    public function postblog()
    {
        return $this->belongsTo(Postblog::class);
    }
        public function user()
    {
        return $this->belongsTo(User::class);
    }   
}
