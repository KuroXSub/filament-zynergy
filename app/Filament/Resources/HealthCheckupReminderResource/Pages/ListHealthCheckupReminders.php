<?php

namespace App\Filament\Resources\HealthCheckupReminderResource\Pages;

use App\Filament\Resources\HealthCheckupReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthCheckupReminders extends ListRecords
{
    protected static string $resource = HealthCheckupReminderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
