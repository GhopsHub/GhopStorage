<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaquinariaResource\Pages;
use App\Models\Maquinaria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MaquinariaResource extends Resource
{
	protected static ?string $model = Maquinaria::class;

	protected static ?string $navigationIcon = 'heroicon-o-truck';

	public static function getNavigationSort(): ?int
	{
		return 1;
	}

	public static function form(Form $form): Form
	{
		return $form->schema([
			Forms\Components\TextInput::make('nombre')
				->label('Nombre de la maquinaria')
				->placeholder('Ej: Excavadora CAT 320D')
				->required()
				->maxLength(255)
				->unique(ignoreRecord: true),

			Forms\Components\TextInput::make('marca')
				->label('Marca de la maquinaria')
				->placeholder('Ej: CAT')
				->required()
				->maxLength(255)
				->unique(ignoreRecord: true),

			Forms\Components\TextInput::make('modelo')
				->label('modelo de la maquinaria')
				->placeholder('Ej: CAT 320D')
				->required()
				->maxLength(255)
				->unique(ignoreRecord: true),

			Forms\Components\TextInput::make('numero_serie')
				->label('numero de serie de la maquinaria')
				->placeholder('Ej: CAT 320D')
				->required()
				->maxLength(255)
				->unique(ignoreRecord: true),

			Forms\Components\TextInput::make('tipo')
				->label('tipo de maquinaria')
				->placeholder('Ej: Excavadora')
				->required()
				->maxLength(255)
				->unique(ignoreRecord: true),

			Forms\Components\TextInput::make('unidades')
				->label('unidades de maquinaria')
				->placeholder('Ej: 10')
				->numeric()
				->required(),

			Forms\Components\TextInput::make('ubicacion_actual')
				->label('ubicacion actual de la maquinaria')
				->placeholder('Ej: Taller')
				->required()
				->maxLength(255),

			Forms\Components\TextInput::make('observaciones')
				->label('observaciones de la maquinaria')
				->placeholder('Ej: Se requiere mantenimiento')
				->required()
				->maxLength(255),

			Forms\Components\Select::make('estado')
				->label('estado de la maquinaria')
				->options([
					'disponible' => '🟢 Disponible',
					'no_disponible' => '🔵 No disponible',
					'mantenimiento' => '🟡 Mantenimiento',
					'sin_unidades' => '🔴 Sin unidades',
				])
				->default('no_disponible')
				->required(),
		]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('nombre')
					->label('Nombre')
					->searchable(),

				Tables\Columns\TextColumn::make('marca')
					->label('Marca')
					->searchable(),

				Tables\Columns\TextColumn::make('modelo')
					->label('Modelo')
					->searchable(),

				Tables\Columns\TextColumn::make('numero_serie')
					->label('Número de serie')
					->searchable()
					->toggleable(),

				Tables\Columns\TextColumn::make('tipo')
					->label('Tipo')
					->searchable(),

				Tables\Columns\TextColumn::make('unidades')
					->label('Unidades')
					->toggleable(),

				Tables\Columns\TextColumn::make('ubicacion_actual')
					->label('Ubicación')
					->searchable(),

				Tables\Columns\TextColumn::make('observaciones')
					->label('Observaciones')
					->toggleable(),

				Tables\Columns\TextColumn::make('estado')
					->label('Estado')
					->badge()
					->formatStateUsing(fn($state) => match ($state) {
						'disponible' => 'Disopnible',
						'no_disponible' => 'No disponible',
						'mantenimiento' => 'Mantenimiento',
						'sin_unidades' => 'Sin unidades',
						default => ucfirst($state),
					})
					->color(fn($state) => match ($state) {
						'disponible' => 'success',
						'no_disponible' => 'info',
						'mantenimiento' => 'warning',
						'sin_unidades' => 'danger',
						default => 'secondary',
					})

			])

			->filters([
				Tables\Filters\SelectFilter::make('estado')
					->label('Filtrar por estado')
					->options([
						'disponible' => 'Disopnible',
						'no_disponible' => 'No disponible',
						'mantenimiento' => 'Mantenimiento',
						'sin_unidades' => 'Sin unidades',
					])
			])

			->actions([
				Tables\Actions\ActionGroup::make([
					Tables\Actions\DeleteAction::make()->icon('heroicon-m-trash'),
				]),
			])

			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\BulkAction::make('cambiarEstado')
						->label('Cambiar estado')
						->icon('heroicon-m-adjustments-horizontal')
						->form([
							Forms\Components\Select::make('nuevo_estado')
								->label('Nuevo estado')
								->options([
									'disponible' => 'Disopnible',
									'no_disponible' => 'No disponible',
									'mantenimiento' => 'Mantenimiento',
									'sin_unidades' => 'Sin unidades',
								])
								->required(),
						])
						->action(function ($records, array $data) {
							$records->each(function ($record) use ($data) {
								$record->update([
									'estado' => $data['nuevo_estado'],
								]);
							});
						})
						->successNotificationTitle('Estado actualizado correctamente'),
					Tables\Actions\DeleteBulkAction::make(),
				]),
			])
			->striped();
	}

	public static function getRelations(): array
	{
		return [];
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
