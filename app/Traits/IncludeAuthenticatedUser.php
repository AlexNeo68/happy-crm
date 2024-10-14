<?php

namespace App\Traits;

trait IncludeAuthenticatedUser
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
