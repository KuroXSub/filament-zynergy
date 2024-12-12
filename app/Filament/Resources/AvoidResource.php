<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvoidResource\Pages;
use App\Filament\Resources\AvoidResource\RelationManagers;
use App\Models\Avoid;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AvoidResource extends Resource
{
    protected static ?string $model = Avoid::class;

    protected static ?string $navigationGroup = 'Personalization';
    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-stop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('disease_id')
                    ->required()
                    ->relationship('disease', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('disease.name')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAvoids::route('/'),
            'create' => Pages\CreateAvoid::route('/create'),
            'edit' => Pages\EditAvoid::route('/{record}/edit'),
        ];
    }    
}
