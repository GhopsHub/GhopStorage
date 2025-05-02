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

	//? Redireccion al index posterior a guargar
	protected function getRedirectUrl(): string
	{
		return $this->getResource()::getUrl('index');
	}

	//? Titulo dinamico
	public function getTitle(): string
	{
		return 'Editar: ' . $this->record->nombre;
	}
}
