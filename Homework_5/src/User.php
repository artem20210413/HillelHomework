<?php

namespace Artem\HillelHomework;

final class User extends Model
{
    /** Якщо змінні 'name' та 'email' будуть protected, то до них неможливо буде звернутися как у прикладі */
    public $name;
    public $email;

}