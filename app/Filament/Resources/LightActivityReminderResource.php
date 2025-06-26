<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LightActivityReminderResource\Pages;
use App\Filament\Resources\LightActivityReminderResource\RelationManagers;
use App\Models\LightActivityReminder;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LightActivityReminderResource extends Resource
{
    protected static ?string $model = LightActivityReminder::class;

    protected static ?string $navigationIcon = 'heroicon-o-sun';
    protected static ?string $navigationGroup = 'Reminders';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identity')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->relationship('user', 'name'),
                        Forms\Components\TextInput::make('activity_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('activity_time')
                            ->default(now()) 
                            ->hidden(),
                        ])->columns(2),
                
                Section::make('Time')
                    ->schema([
                        Forms\Components\TextInput::make('activity_hour')
                            ->label('Activity Hour')
                            ->placeholder('0 - 23 Hour')
                            ->numeric() 
                            ->required() 
                            ->minValue(0)
                            ->maxValue(23) 
                            ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                        Forms\Components\TextInput::make('activity_minute')
                            ->label('Activity Minute')
                            ->placeholder('0 - 59 Minute')
                            ->numeric() 
                            ->required()
                            ->minValue(0)
                            ->maxValue(59) 
                            ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                            ])->columns(2),
                Section::make('Settings')
                    ->schema([
                        Forms\Components\Select::make('activity_frequency')
                            ->label('Frequency')
                            ->default(0)
                            ->required()
                            ->options([ 
                                0 => 'Sekali',
                                1 => 'Harian',
                                ]),
                        Forms\Components\Select::make('toggle_value')
                            ->label('Reminder Status')
                            ->default(0)
                            ->required()
                            ->options([ 
                                0 => 'Non-aktif',
                                1 => 'Aktif',
                                ]) ,
                            ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activity_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activityTime')
                    ->label('Activity time')
                    ->formatStateUsing(fn ($record) => sprintf('%s : %02d', $record->activity_hour, $record->activity_minute)),
                Tables\Columns\TextColumn::make('activity_frequency')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        1 => 'Harian',
                        0 => 'Sekali',
                        default => 'Tidak diketahui',
                    }),
                Tables\Columns\TextColumn::make('toggle_value')
                    ->label('Status alarm')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => match ((int) $state) {
                        1 => 'Aktif',
                        0 => 'Non-aktif',
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
                //
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
            'index' => Pages\ListLightActivityReminders::route('/'),
            'create' => Pages\CreateLightActivityReminder::route('/create'),
            'edit' => Pages\EditLightActivityReminder::route('/{record}/edit'),
        ];
    }    
}
