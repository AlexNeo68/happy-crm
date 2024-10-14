<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use App\Traits\IncludeAuthenticatedUser;
use App\Traits\RedirectToIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMessage extends CreateRecord
{

    use IncludeAuthenticatedUser;
    use RedirectToIndex;

    protected static string $resource = MessageResource::class;
}
