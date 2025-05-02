<?php

namespace App\Filament\Resources\horariosResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\HorariosResource;

class EditHorario extends EditRecord
{
	protected static string $resource = HorariosResource::class;

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
		return 'Editar: ' . $this->record->name;
	}
}
