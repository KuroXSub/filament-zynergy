<?php

namespace App\Filament\Resources\SleepReminderResource\Pages;

use App\Filament\Resources\SleepReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSleepReminder extends EditRecord
{
    protected static string $resource = SleepReminderResource::class;

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
