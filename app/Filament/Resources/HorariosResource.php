<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HorariosResource\Pages;
use App\Models\Horario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Carbon\Carbon;
use Filament\Tables\Actions\ReplicateAction;

class HorariosResource extends Resource
{
    protected static ?string $model = Horario::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información General')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre del Horario')
                            ->placeholder('Ej: Mañana')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Detalles del Horario')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TimePicker::make('hora_inicio')
                                    ->label('Hora de Inicio')
                                    ->required(),

                                Forms\Components\TimePicker::make('hora_fin')
                                    ->label('Hora de Fin')
                                    ->required(),
                            ]),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Estado')
                    ->schema([
                        Forms\Components\Toggle::make('estado')
                            ->label('¿Está Activo?')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('hora_inicio')
                    ->label('Hora de inicio')
                    ->sortable()
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('h:i A')),

                Tables\Columns\TextColumn::make('hora_fin')
                    ->label('Hora de fin')
                    ->sortable()
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('h:i A')),

                Tables\Columns\TextColumn::make('estado')
                    ->label('Estado')
                    ->formatStateUsing(fn($state) => $state ? 'Activo' : 'Inactivo')
                    ->badge()
                    ->color(fn($state) => $state ? 'success' : 'danger'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        true => 'Activo',
                        false => 'Inactivo',
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()->icon('heroicon-m-pencil-square'),
                    Tables\Actions\DeleteAction::make()->icon('heroicon-m-trash'),
                    ReplicateAction::make()->icon('heroicon-m-document-duplicate'),
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

    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHorario::route('/'),
            'create' => Pages\CreateHorario::route('/create'),
            'edit' => Pages\EditHorario::route('/{record}/edit'),
        ];
    }
}
