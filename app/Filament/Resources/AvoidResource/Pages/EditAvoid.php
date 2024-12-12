<?php

namespace App\Filament\Resources\AvoidResource\Pages;

use App\Filament\Resources\AvoidResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvoid extends EditRecord
{
    protected static string $resource = AvoidResource::class;

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
