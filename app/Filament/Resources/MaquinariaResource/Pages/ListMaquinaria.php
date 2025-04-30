<?php

namespace App\Filament\Resources\MaquinariaResource\Pages;

use App\Filament\Resources\MaquinariaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaquinaria extends ListRecords
{
    protected static string $resource = MaquinariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
