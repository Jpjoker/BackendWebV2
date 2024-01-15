<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    protected $fillable = ['category_id', 'question', 'answer'];
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(FaqCategory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
        public function questions()
    {
        return $this->hasMany(FaqQuestion::class);
    }

    // many to many relationship with faq het is ook voor mijn questions naar comments te kunnen krijgen
    //     public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
    
//    // test2 best
    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'faq_comments', 'faq_question_id', 'comment_id');
    }

    //test3
    // public function comments()
    // {
    //     return $this->belongsToMany(Comment::class, 'faq_comments');
    // }
        // FaqQuestion model
// public function comments()
// {
//     return $this->hasMany(Comment::class);
// }

// public function comments()
// {
//     return $this->hasMany(\App\Models\Comment::class);
// }






}
