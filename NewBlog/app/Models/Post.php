<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date_pub',
        'author',
        'status',
        'category_id'
        // cette struture de code suivante nous parles la relation One to Many : une post=> (article) ne peut recevoir qu'une seule categorie
    ];
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
