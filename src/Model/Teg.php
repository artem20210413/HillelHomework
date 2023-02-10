<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tag extends Model
{
    public $table = 'tag';

    protected $fillable = [
        'id',
        'name',
    ];

//     public function post()
//     {
//         return $this->belongsToMany(Post::class)->withTimestamps();
//     }
}