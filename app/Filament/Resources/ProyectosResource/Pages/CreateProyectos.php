<?php

namespace App\Filament\Resources\ProyectosResource\Pages;

use App\Filament\Resources\ProyectosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProyectos extends CreateRecord
{
	protected static string $resource = ProyectosResource::class;

	//? Redireccion al index posterior a guargar
	public function getRedirectUrl(): string
	{
		return $this->getResource()::getUrl('index');
	}
}
