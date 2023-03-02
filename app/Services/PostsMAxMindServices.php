<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Categor;
use App\Models\Post;
use App\Models\Teg;
use App\Repositories\PostRepositoryInterface;

class PostsMAxMindServices
{
    public function __construct(public PostRepositoryInterface $postRepository)
    {
    }

    public function find(int $id): Post
    {
        return $this->postRepository->find($id);
    }


}
