<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'question'];

    // Define the relationship to the User model (if you want to link questions to users)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
