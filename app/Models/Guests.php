<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Guests
 * @package App\Models
 * @property integer ip
 * @property string user_ip
 * @property string country
 * @property string redirect
 */
class Guests extends Model
{
    use HasFactory;

}
