<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Customers',
            auth()->user()->customers()->count()),
            Stat::make('Total Appointment in this month',
                auth()->user()->appointments()
                    ->whereMonth('starts_at', Carbon::now()->month)
                    ->whereYear('starts_at', Carbon::now()->year)
                    ->count()
            ),
            Stat::make('Percentage confirmed appointments',
                (auth()->user()->appointments()->count() ? $this->getConfirmedAppointments() : 0) . ' %'
            )
        ];
    }

    protected function getConfirmedAppointments():int
    {
        return round(auth()->user()->appointments()->whereIsConfirmed(true)->count() / auth()->user()->appointments()->count() * 100);
    }
}
