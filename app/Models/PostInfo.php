<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function Post(){
        return $this->hasMany(Posts::class,'id');
    }
}
