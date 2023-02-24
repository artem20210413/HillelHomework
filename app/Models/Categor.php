<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Categor
 * @package App\Models
 * @property integer id
 * @property string name
 * @property bool active
 */
class Categor extends Model
{
    public $table = 'category';

    protected $fillable = [
        'id',
        'name',
        'active'
    ];

    public function post(): hasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
