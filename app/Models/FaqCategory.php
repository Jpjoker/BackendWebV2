<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;
    public function questions()
    {
        return $this->hasMany(FaqQuestion::class);
    }
    protected $fillable = ['name'];
}
