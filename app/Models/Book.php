<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "author",
        "PublicationYear",
        "genre",
        "isbn",
        "coverImageUrl",
    ];
    protected $primaryKey = 'book_id';
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
