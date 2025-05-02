<?php

namespace App\Filament\Resources\horariosResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\HorariosResource;

class ListHorarios extends ListRecords
{
	protected static string $resource = HorariosResource::class;

	protected function getHeaderActions(): array
	{
		return [
			Actions\CreateAction::make(),
		];
	}
}
