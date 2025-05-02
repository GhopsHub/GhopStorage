<?php

namespace App\Filament\Resources\HerramientasResource\Pages;

use App\Filament\Resources\HerramientasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHerramientas extends CreateRecord
{
	protected static string $resource = HerramientasResource::class;

	//? Redireccion al index posterior a guargar
	public function getRedirectUrl(): string
	{
		return $this->getResource()::getUrl('index');
	}
}
