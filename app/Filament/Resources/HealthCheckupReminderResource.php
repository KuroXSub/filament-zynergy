<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthCheckupReminderResource\Pages;
use App\Filament\Resources\HealthCheckupReminderResource\RelationManagers;
use App\Models\HealthCheckupReminder;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HealthCheckupReminderResource extends Resource
{
    protected static ?string $model = HealthCheckupReminder::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'Reminders';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identity')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->relationship('user', 'name')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('checkup_name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('checkup_note')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\DateTimePicker::make('checkup_time')
                            ->default(now()) 
                            ->hidden(),
                    ])->columnSpan(2)->columns(2),
                
                    Section::make('Date')
                        ->schema([
                            Forms\Components\TextInput::make('checkup_year')
                                ->label('Checkup year')
                                ->placeholder('20XX')
                                ->numeric() 
                                ->required() 
                                ->minValue(2024)
                                ->maxValue(2030) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                            Forms\Components\TextInput::make('checkup_month')
                                ->label('Checkup month')
                                ->placeholder('1 - 12')
                                ->numeric() 
                                ->required()
                                ->minValue(1)
                                ->maxValue(12) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                            Forms\Components\TextInput::make('checkup_date')
                                ->label('Checkup date')
                                ->placeholder('1 - 31')
                                ->numeric() 
                                ->required()
                                ->minValue(1)
                                ->maxValue(31) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                        ])->columnSpan(1),
                    Section::make('Time')
                        ->schema([
                            Forms\Components\TextInput::make('checkup_hour')
                                ->label('Checkup hour')
                                ->placeholder('0 - 24')
                                ->numeric() 
                                ->required() 
                                ->minValue(0)
                                ->maxValue(24) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                            Forms\Components\TextInput::make('checkup_minute')
                                ->label('Checkup minute')
                                ->placeholder('0 - 59')
                                ->numeric() 
                                ->required()
                                ->minValue(0)
                                ->maxValue(59) 
                                ->extraInputAttributes([ 'inputmode' => 'numeric', 'pattern' => '[0-9]*', ]),
                    ])->columnSpan(1),

                Section::make('Settings')
                    ->schema([
                        Forms\Components\Select::make('toggle_value')
                            ->label('Reminder Status')
                            ->default(0)
                            ->required()
                            ->options([ 
                                0 => 'Non-aktif',
                                1 => 'Aktif',
                                ]) ,
                ])->columnSpan(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('checkup_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('checkup_datetime')
                    ->label('Checkup date')
                    ->formatStateUsing(fn ($record) => Carbon::create(
                        $record->checkup_year,
                        $record->checkup_month,
                        $record->checkup_date
                    )->format('Y-m-d')),
                Tables\Columns\TextColumn::make('checkupTime')
                    ->label('Checkup time')
                    ->formatStateUsing(fn ($record) => sprintf('%s : %02d', $record->checkup_hour, $record->checkup_minute)),
                Tables\Columns\TextColumn::make('toggle_value')
                    ->label('Status reminder')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => match ($state) {
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
            'index' => Pages\ListHealthCheckupReminders::route('/'),
            'create' => Pages\CreateHealthCheckupReminder::route('/create'),
            'edit' => Pages\EditHealthCheckupReminder::route('/{record}/edit'),
        ];
    }    
}
