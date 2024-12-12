<?php

namespace App\Filament\Resources\LightActivityReminderResource\Pages;

use App\Filament\Resources\LightActivityReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLightActivityReminder extends EditRecord
{
    protected static string $resource = LightActivityReminderResource::class;

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
