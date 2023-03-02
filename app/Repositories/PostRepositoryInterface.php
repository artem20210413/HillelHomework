<?php

namespace App\Repositories;

use App\Models\Post;

interface PostRepositoryInterface
{

    public function find(int $id): Post;

}
