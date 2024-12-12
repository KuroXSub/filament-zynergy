<?php

namespace App\Filament\Resources\MealReminderResource\Pages;

use App\Filament\Resources\MealReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMealReminders extends ListRecords
{
    protected static string $resource = MealReminderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
