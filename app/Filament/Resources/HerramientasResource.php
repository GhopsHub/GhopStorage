<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Herramienta;
use Illuminate\Validation\Rule;
use Filament\Resources\Resource;
use App\Filament\Resources\HerramientasResource\Pages;

class HerramientasResource extends Resource
{
	protected static ?string $model = Herramienta::class;

	protected static ?string $navigationIcon = 'heroicon-o-wrench';

	public static function getNavigationSort(): ?int
	{
		return 2;
	}

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('nombre')
					->label('Nombre de la Herramienta')
					->placeholder('Ej: Martillo')
					->required()
					->maxLength(255)
					->unique(ignoreRecord: true),

				Forms\Components\TextInput::make('tipo')
					->label('Tipo de herramienta')
					->placeholder('Ej: Herramienta de mano')
					->required()
					->maxLength(255),

				Forms\Components\TextInput::make('marca')
					->label('Marca de la herramienta')
					->placeholder('Ej: Bosch')
					->required()
					->maxLength(255),

				Forms\Components\TextInput::make('unidades')
					->label('Número de unidades')
					->numeric()
					->placeholder('Ej: 10')
					->required(),

				Forms\Components\TextInput::make('observaciones')
					->label('Observaciones de la herramienta')
					->placeholder('Ej: Se requiere mantenimiento')
					->required()
					->maxLength(255),

				Forms\Components\Select::make('estado')
					->label('Estado de la herramienta')
					->options([
						'disponible' => 'Disponible',
						'no_disponible' => 'No disponible',
					])
					->required(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('nombre')
					->label('Nombre')
					->searchable()
					->sortable(),

				Tables\Columns\TextColumn::make('tipo')
					->label('Tipo')
					->searchable(),

				Tables\Columns\TextColumn::make('marca')
					->label('Marca')
					->searchable(),

				Tables\Columns\TextColumn::make('unidades')
					->label('Unidades')
					->sortable(),

				Tables\Columns\TextColumn::make('observaciones')
					->label('Observaciones'),

				Tables\Columns\TextColumn::make('estado')
					->label('Estado')
					->badge()
					->formatStateUsing(fn($state) => match ($state) {
						'disponible' => 'Disponible',
						'no_disponible' => 'No disponible',
						'sin_existencias' => 'Sin existencias',
						default => ucfirst($state),
					})
					->color(fn($state) => match ($state) {
						'disponible' => 'success',
						'no_disponible' => 'warning',
						'sin_existencias' => 'danger',
						default => 'secondary',
					})

			])
			->filters([
				Tables\Filters\SelectFilter::make('estado')
					->label('Filtrar por estado')
					->options([
						'disponible' => 'Disponible',
						'no_disponible' => 'No disponible',
						'sin_existencias' => 'Sin existencias',
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
									true => 'Activo',
									false => 'Inactivo',
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
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListHerramientas::route('/'),
			'create' => Pages\CreateHerramientas::route('/create'),
			'edit' => Pages\EditHerramientas::route('/{record}/edit'),
		];
	}
}
