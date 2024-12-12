<?php

namespace App\Filament\Resources\MealReminderResource\Pages;

use App\Filament\Resources\MealReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMealReminder extends EditRecord
{
    protected static string $resource = MealReminderResource::class;

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
