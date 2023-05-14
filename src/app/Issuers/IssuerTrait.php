<?php

namespace App\Issuers;

use Illuminate\Database\Eloquent\Model;

trait IssuerTrait
{
    protected Model $baseModel;

    protected function create(array $attrs = []): void
    {
        $this->baseModel->create($attrs);
    }
}
