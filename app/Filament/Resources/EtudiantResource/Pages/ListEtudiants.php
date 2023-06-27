<?php

namespace App\Filament\Resources\EtudiantResource\Pages;

use App\Filament\Resources\EtudiantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEtudiants extends ListRecords
{
    protected static string $resource = EtudiantResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
