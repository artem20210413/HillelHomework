<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Categor
 * @package App\Models
 * @property integer id
 * @property string email
 * @property string password
 *
 */
class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Images::class, 'imageable');
    }

}
