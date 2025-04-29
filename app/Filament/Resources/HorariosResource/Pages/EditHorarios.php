<?php

namespace App\Filament\Resources\horariosResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\HorariosResource;

class Edithorario extends EditRecord
{
    protected static string $resource = HorariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
