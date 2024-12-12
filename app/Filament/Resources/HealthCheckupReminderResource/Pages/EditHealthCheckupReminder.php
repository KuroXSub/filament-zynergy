<?php

namespace App\Filament\Resources\HealthCheckupReminderResource\Pages;

use App\Filament\Resources\HealthCheckupReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthCheckupReminder extends EditRecord
{
    protected static string $resource = HealthCheckupReminderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
