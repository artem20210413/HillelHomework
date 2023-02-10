<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teg extends Model
{
    public $table = 'teg';

    protected $fillable = [
        'id',
        'name',
    ];


}