<?php

namespace App\Filament\Resources\AvoidResource\Pages;

use App\Filament\Resources\AvoidResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAvoid extends CreateRecord
{
    protected static string $resource = AvoidResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
