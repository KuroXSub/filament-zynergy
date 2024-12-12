<?php

namespace App\Filament\Resources\MealReminderResource\Pages;

use App\Filament\Resources\MealReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMealReminder extends CreateRecord
{
    protected static string $resource = MealReminderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
