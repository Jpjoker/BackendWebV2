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

        // many to many relationship with 
    // public function faqs()
    // {
    //     return $this->belongsToMany(FaqComment::class, 'faq_comments');
    // }
    public function faqs()
    {
        return $this->belongsToMany(Faq::class, 'faq_comments');
    }
    
    // het is voor mijn many to many methode toe te passen  hij doe moeilijk op mijn page question en comments
        // public function question()
        // {
        // return $this->belongsTo(FaqQuestion::class);
        // }

        // test 2
    public function faqQuestions()
    {
        return $this->belongsToMany(FaqQuestion::class, 'faq_comments', 'comment_id', 'faq_question_id');
    }
        // test 3
    // public function faqQuestions()
    // {
    //     return $this->belongsToMany(FaqQuestion::class, 'faq_comments');
    // }
    
}
