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
}
