<?php

namespace App\Filament\Resources\AvoidResource\Pages;

use App\Filament\Resources\AvoidResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAvoids extends ListRecords
{
    protected static string $resource = AvoidResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
