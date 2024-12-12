<?php

namespace App\Filament\Resources\FavoriteResource\Pages;

use App\Filament\Resources\FavoriteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFavorite extends EditRecord
{
    protected static string $resource = FavoriteResource::class;

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
