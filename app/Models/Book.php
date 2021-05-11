<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute($value)
    {
        return "title is:" . ucfirst($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['Title'] = strtolower($value);
    }
    public function getImageAttribute($value)
    {

        return $_ENV['APP_URL'] . "/storage/" . $value;
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function getImageIdAttribute($value)
    {

        $book_image = Image::find($value)->url;
        return $_ENV['APP_URL'] . "/storage/" . $book_image;
    }
}

