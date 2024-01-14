<?php

namespace App\Models;
use App\Models\FaqQuestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;
    public function questions()
    {
        return $this->hasMany(FaqQuestion::class , 'category_id');
    }
    protected $fillable = ['name'];
   
}