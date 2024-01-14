<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Postblog;
use App\Models\FaqQuestion;
use App\Models\Comment;
use App\Models\FaqCategory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function postblogs()
    {
        return $this->hasMany(Postblog::class);
    }

    // User.php
    public function submittedFaqQuestions()
    {
        return $this->hasMany(FaqQuestion::class);
    }

        public function createdFaqQuestions()
    {
        return $this->hasMany(FaqQuestion::class, 'created_by');
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
    public function isAdmin()
    {
        return $this->usertype === 'admin'; // Make sure 'usertype' is the correct field
    }
    
    

}
