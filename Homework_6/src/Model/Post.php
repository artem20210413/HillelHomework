<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model

{
    public $table = 'post';

    protected $fillable = [
        'id',
        'category_id',
        'header',
        'comment'

    ];

    public function category(): HasOne
    {
        return $this->hasOne(Categor::class, 'id', 'category_id');
    }
    public function teg()
    {
        return $this->belongsToMany(Teg::class)->withTimestamps();
    }
}