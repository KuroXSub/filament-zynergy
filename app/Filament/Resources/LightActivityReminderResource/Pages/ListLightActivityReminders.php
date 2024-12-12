<?php

namespace App\Filament\Resources\LightActivityReminderResource\Pages;

use App\Filament\Resources\LightActivityReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLightActivityReminders extends ListRecords
{
    protected static string $resource = LightActivityReminderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
