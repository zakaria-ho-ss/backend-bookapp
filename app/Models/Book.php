<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function author(){

        return $this->belongsTo(Author::class);
    }

    public function getTitleAttribute($value)
    {
        return "title is:" . ucfirst($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['Title'] = strtolower($value);
    }
   
}

