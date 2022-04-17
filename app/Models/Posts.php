<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Posts extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'image',
        'author',
        'publish'
    ];

    /**
     * @return string[][]
     */
    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return BelongsTo
     */
    public function Author() {
        return $this->belongsTo(User::class, 'author');
    }

    public function Tags(){
        return $this->belongsTo(PostInfo::class,'id');
    }
}
