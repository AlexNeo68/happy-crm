<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Traits\IncludeAuthenticatedUser;
use App\Traits\RedirectToIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{

    use IncludeAuthenticatedUser, RedirectToIndex;

    protected static string $resource = ServiceResource::class;


}
