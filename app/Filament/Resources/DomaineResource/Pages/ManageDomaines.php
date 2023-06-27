<?php

namespace App\Filament\Resources\DomaineResource\Pages;

use App\Filament\Resources\DomaineResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDomaines extends ManageRecords
{
    protected static string $resource = DomaineResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
