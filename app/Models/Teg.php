<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Teg
 * @package App\Models
 * @property integer id
 * @property string name
 */
class Teg extends Model
{
    public $table = 'teg';

    protected $fillable = [
        'id',
        'name',
    ];

}
