<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HerramientasResource\Pages;
use App\Filament\Resources\HerramientasResource\RelationManagers;
use App\Models\Herramienta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                //
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
            'index' => Pages\ListHerramientas::route('/'),
            'create' => Pages\CreateHerramientas::route('/create'),
            'edit' => Pages\EditHerramientas::route('/{record}/edit'),
        ];
    }
}
