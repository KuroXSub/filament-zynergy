<?php

namespace App\Filament\Resources\InterestResource\Pages;

use App\Filament\Resources\InterestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterest extends EditRecord
{
    protected static string $resource = InterestResource::class;

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
