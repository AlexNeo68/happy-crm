<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Traits\IncludeAuthenticatedUser;
use App\Traits\RedirectToIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    use IncludeAuthenticatedUser;
    use RedirectToIndex;

    protected static string $resource = AppointmentResource::class;


}
