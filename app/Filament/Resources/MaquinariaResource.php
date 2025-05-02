<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaquinariaResource\Pages;
use App\Filament\Resources\MaquinariaResource\RelationManagers;
use App\Models\Maquinaria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaquinariaResource extends Resource
{
	protected static ?string $model = Maquinaria::class;

	protected static ?string $navigationIcon = 'heroicon-o-truck';

	protected static ?string $label = 'Maquinaria';

	public static function getNavigationSort(): ?int
	{
		return 1;
	}

	public static function form(Form $form): Form
	{
		return $form
			->schema([






				'tipo',
				'nombre',
				'marca',
				'modelo',
				'numero_serie',
				'estado',
				'unidades',
				'ubicacion_actual',
				'observaciones',
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				//
			])
			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListMaquinaria::route('/'),
			'create' => Pages\CreateMaquinaria::route('/create'),
			'edit' => Pages\EditMaquinaria::route('/{record}/edit'),
		];
	}
}
