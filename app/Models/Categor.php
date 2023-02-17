<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

}
