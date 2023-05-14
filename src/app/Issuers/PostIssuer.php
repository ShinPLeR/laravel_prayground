<?php

namespace App\Issuers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostIssuer
{
    use IssuerTrait;

    public function __construct(Post $post)
    {
        $this->baseModel = $post;
    }

    /**
     * @param Builder $builder
     * @param int $id
     * @return Builder
     */
    public function scopeWhereId(Builder $builder, int $id): Builder
    {
        return $builder->where('id', $id);
    }
}
