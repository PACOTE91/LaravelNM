<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'resume', 'image', 'price', 'category_id'];



    public function category()
    {
        //Relacion 1:1
        return $this->belongsTo(Category::class);
    }


    //Relacion N:M de Post con Tag
    public function authors()
    {
        //Relación muchos-muchos
        return $this->belongsToMany(Author::class);
    }
    use HasFactory;
}