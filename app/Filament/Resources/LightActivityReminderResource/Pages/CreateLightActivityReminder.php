<?php

namespace App\Filament\Resources\LightActivityReminderResource\Pages;

use App\Filament\Resources\LightActivityReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLightActivityReminder extends CreateRecord
{
    protected static string $resource = LightActivityReminderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
