<?php

namespace App\Filament\Resources\TravailResource\Pages;

use App\Filament\Resources\TravailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTravails extends ListRecords
{
    protected static string $resource = TravailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
