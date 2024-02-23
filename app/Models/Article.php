<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'body', 'slug', 'active', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
