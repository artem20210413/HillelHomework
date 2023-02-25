<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * Class Post
 * @package App\Models
 * @property integer $id
 * @property integer category_id
 * @property string header
 * @property string comment
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

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

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Images::class, 'imageable');
    }
}
