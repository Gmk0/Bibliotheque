<?php

namespace App\Filament\Resources\EtudiantResource\Pages;

use App\Filament\Resources\EtudiantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEtudiant extends EditRecord
{
    protected static string $resource = EtudiantResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
