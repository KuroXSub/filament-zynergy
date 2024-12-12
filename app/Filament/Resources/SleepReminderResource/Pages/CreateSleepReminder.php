<?php

namespace App\Filament\Resources\SleepReminderResource\Pages;

use App\Filament\Resources\SleepReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSleepReminder extends CreateRecord
{
    protected static string $resource = SleepReminderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
