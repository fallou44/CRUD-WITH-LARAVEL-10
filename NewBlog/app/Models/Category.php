<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // cette struture de code suivante nous parles la relation One to Many : un categoire peut recevoir un ou plusiers (articles) 
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
