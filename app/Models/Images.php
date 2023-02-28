<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Images extends Model
{

    protected $fillable = [
        'body', 'imageable_id', 'imageable_type',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

}
