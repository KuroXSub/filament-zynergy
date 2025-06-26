<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SleepReminderResource\Pages;
use App\Filament\Resources\SleepReminderResource\RelationManagers;
use App\Models\SleepReminder;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SleepReminderResource extends Resource
{
    protected static ?string $model = SleepReminder::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationGroup = 'Reminders';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitiy')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->relationship('user', 'name'),
                        Forms\Components\TextInput::make('sleep_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('sleep_time')
                            ->default(now()) 
                            ->hidden(),
                    ])->columns(2),

                Section::make('Time')
                    ->schema([
                        Group::make()->schema([
                            Forms\Components\TextInput::make('sleep_hour')
                                ->label('Sleep hour')
                                ->placeholder('0 - 23 hour')
                                ->numeric() 
                                ->required() 
                                ->minValue(0)
                                ->maxValue(23) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                            Forms\Components\TextInput::make('sleep_minute')
                                ->label('Sleep minute')
                                ->placeholder('0 - 59 minute')
                                ->numeric() 
                                ->required()
                                ->minValue(0)
                                ->maxValue(59) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                        ])->columns(2),
                        Group::make()->schema([
                            Forms\Components\TextInput::make('wake_hour')
                                ->label('Wake hour')
                                ->placeholder('0 - 59 hour')
                                ->numeric() 
                                ->required() 
                                ->minValue(0)
                                ->maxValue(23) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                            Forms\Components\TextInput::make('wake_minute')
                                ->label('Wake minute')
                                ->placeholder('0 - 59 minute')
                                ->numeric() 
                                ->required()
                                ->minValue(0)
                                ->maxValue(59) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                        ])->columns(2)
                    ])->columns(2),

                Section::make('Settings')
                    ->schema([
                        Forms\Components\Select::make('sleep_frequency')
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
                Tables\Columns\TextColumn::make('sleep_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sleepTime')
                    ->label('Sleep time')
                    ->formatStateUsing(fn ($record) => sprintf('%s : %02d', $record->sleep_hour, $record->sleep_minute)),
                Tables\Columns\TextColumn::make('wake_time')
                    ->label('Wake up time')
                    ->formatStateUsing(fn ($record) => sprintf('%s : %02d', $record->wake_hour, $record->wake_minute)),
                Tables\Columns\TextColumn::make('sleep_frequency')
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
            'index' => Pages\ListSleepReminders::route('/'),
            'create' => Pages\CreateSleepReminder::route('/create'),
            'edit' => Pages\EditSleepReminder::route('/{record}/edit'),
        ];
    }    
}
