<?php

namespace App\Filament\Resources\HealthCheckupReminderResource\Pages;

use App\Filament\Resources\HealthCheckupReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHealthCheckupReminder extends CreateRecord
{
    protected static string $resource = HealthCheckupReminderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
