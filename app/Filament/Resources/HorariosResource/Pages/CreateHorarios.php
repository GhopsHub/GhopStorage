<?php

namespace App\Filament\Resources\HorariosResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\HorariosResource;

class CreateHorarios extends CreateRecord
{
	protected static string $resource = HorariosResource::class;

	//? Redireccion al index posterior a guargar
	public function getRedirectUrl(): string
	{
		return $this->getResource()::getUrl('index');
	}
}
