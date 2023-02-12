<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categor extends Model
{
    public $table = 'category';

    protected $fillable = [
        'id',
        'name',
        'active'
    ];

}
