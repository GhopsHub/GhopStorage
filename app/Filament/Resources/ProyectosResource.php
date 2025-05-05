<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProyectosResource\Pages;
use App\Models\Proyecto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProyectosResource extends Resource
{
	protected static ?string $model = Proyecto::class;

	protected static ?string $navigationIcon = 'heroicon-o-clipboard';

	public static function getNavigationSort(): ?int
	{
		return 3;
	}

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('nombre')
					->label('Nombre del Proyecto')
					->placeholder('Ej: Construcción de Edificio')
					->required()
					->maxLength(255)
					->unique(ignoreRecord: true),

				Forms\Components\TextInput::make('descripcion')
					->label('Descripción del Proyecto')
					->placeholder('Ej: Construcción de Edificio')
					->required()
					->maxLength(255)
					->unique(ignoreRecord: true),

				Forms\Components\TextInput::make('ubicacion')
					->label('Ubicación del Proyecto')
					->placeholder('Ej: Av. Siempre Viva 123')
					->required()
					->maxLength(255)
					->unique(ignoreRecord: true),

				Forms\Components\DatePicker::make('fecha_inicio')
					->label('Fecha de Inicio')
					->placeholder('Ej: 2023-10-01')
					->required()
					// ->unique(ignoreRecord: true)
					->default(fn() => today())
					->minDate(fn($get, $record) => $record ? null : today()),

				Forms\Components\Select::make('estado')
					->label('¿Estado?')
					->options([
						'activo' => '🟢 Activo',
						'finalizado' => '🔵 Finalizado',
						'pendiente' => '🟡 Pendiente',
						'cancelado' => '🔴 Cancelado',
					])
					->default('pendiente')
					->required(),



				Forms\Components\TextInput::make('responsable')
					->label('Responsable')
					->placeholder('Ej: Juan Pérez')
					->required()
					->maxLength(255)
					->unique(ignoreRecord: true),
			]);
	}

	protected static function makeToggleableColumn($column)
	{
		return $column->toggleable();
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				self::makeToggleableColumn(
					Tables\Columns\TextColumn::make('nombre')
						->label('Nombre')
						->searchable()
				),
				self::makeToggleableColumn(
					Tables\Columns\TextColumn::make('ubicacion')
						->label('Ubicación')
						->searchable()
				),
				self::makeToggleableColumn(
					Tables\Columns\TextColumn::make('descripcion')
						->label('Descripción')
						->searchable()
						->limit(30)
				),
				self::makeToggleableColumn(
					Tables\Columns\TextColumn::make('responsable')
						->label('Responsable')
						->searchable()
						->sortable()
				),
				self::makeToggleableColumn(
					Tables\Columns\TextColumn::make('fecha_inicio')
						->label('Fecha inicio')
						->sortable()
						->searchable()
				),
				self::makeToggleableColumn(
					Tables\Columns\TextColumn::make('estado')
						->label('Estado')
						->badge()
						->formatStateUsing(fn($state) => match ($state) {
							'activo' => 'Activo',
							'finalizado' => 'Finalizado',
							'pendiente' => 'Pendiente',
							'cancelado' => 'Cancelado',
							default => ucfirst($state),
						})
						->color(fn($state) => match ($state) {
							'activo' => 'success',
							'finalizado' => 'info',
							'pendiente' => 'warning',
							'cancelado' => 'danger',
							default => 'secondary',
						})
				),
			])
			->filters([
				Tables\Filters\SelectFilter::make('estado')
					->label('Filtrar por estado')
					->options([
						'activo' => 'Activo',
						'finalizado' => 'Finalizado',
						'pendiente' => 'Pendiente',
						'cancelado' => 'Cancelado',
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
									'activo' => 'Activo',
									'finalizado' => 'Finalizado',
									'pendiente' => 'Pendiente',
									'cancelado' => 'Cancelado',
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
			'index' => Pages\ListProyectos::route('/'),
			'create' => Pages\CreateProyectos::route('/create'),
			'edit' => Pages\EditProyectos::route('/{record}/edit'),
		];
	}
}
