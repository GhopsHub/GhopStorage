<?php

namespace App\Filament\Resources\HerramientasResource\Pages;

use App\Filament\Resources\HerramientasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHerramientas extends ListRecords
{
    protected static string $resource = HerramientasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
