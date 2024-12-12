<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Static_;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Users';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitiy')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->placeholder('Jhon Doe')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->placeholder('example@email.com')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->placeholder('Click this'),
                        Forms\Components\TextInput::make('password')
                            ->placeholder('Minimum length 8 characters')
                            ->password()
                            ->required()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->maxLength(255),
                    ])->columns(2),
                Section::make('Personalization')
                    ->schema([
                        Forms\Components\Select::make('disease_ids')
                            ->multiple()
                            ->relationship('diseases', 'name')
                            ->maxItems(3),
                        Forms\Components\Select::make('interest_ids')
                            ->multiple()
                            ->relationship('interests', 'name')
                            ->maxItems(3),
                        Forms\Components\Select::make('allergy_ids')  
                            ->multiple()
                            ->relationship('allergies', 'name')
                            ->maxItems(3),
                        Forms\Components\Select::make('favorite_ids')  
                            ->multiple()
                            ->relationship('favorites', 'name')
                            ->maxItems(3),
                    ])->columns(2),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('diseases.id')
                    ->label('Diseases')
                    ->formatStateUsing(function ($record) {
                        return $record->diseases->pluck('name')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('interests.id')
                    ->label('Interests')
                    ->formatStateUsing(function ($record) {
                        return $record->interests->pluck('name')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('allergies.id')
                    ->label('Allergy')
                    ->formatStateUsing(function ($record) {
                        return $record->allergies->pluck('name')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('favorites.id')
                    ->label('Favorite')
                    ->formatStateUsing(function ($record) {
                        return $record->favorites->pluck('name')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('Email KuroxSub')
                    ->query(function ($query) { 
                        return $query->where('email', 'not like', '%@kuroxsub.my.id'); 
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
