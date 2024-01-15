<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    // many to many relationship with faq legit
    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'faq_comments');
    }
}
