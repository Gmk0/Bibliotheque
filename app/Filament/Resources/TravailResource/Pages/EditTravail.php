<?php

namespace App\Filament\Resources\TravailResource\Pages;

use App\Filament\Resources\TravailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTravail extends EditRecord
{
    protected static string $resource = TravailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
