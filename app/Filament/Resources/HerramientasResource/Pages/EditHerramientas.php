<?php

namespace App\Filament\Resources\HerramientasResource\Pages;

use App\Filament\Resources\HerramientasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHerramientas extends EditRecord
{
    protected static string $resource = HerramientasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
