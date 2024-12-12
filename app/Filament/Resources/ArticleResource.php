<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\User;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Users';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identity')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('image_url')
                            ->default('https://backoffice-zynergy.gevannoyoh.com/storage/')
                            ->extraInputAttributes(['readonly' => true])
                            ->disabled(),
                        Forms\Components\RichEditor::make('content')
                             ->required(),
                        ])->columnSpan(2),
                
                Section::make('Meta')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Image (Max 2 MB)')
                            ->image()
                            ->maxSize(2048)
                            ->required()
                            ->preserveFilenames()
                            ->afterStateUpdated(function (Closure $set, $state) {
                                $originalName = $state->getClientOriginalName();
                                $set('image_url', 'https://backoffice-zynergy.gevannoyoh.com/storage/' . $originalName);
                            }),
                        Forms\Components\Select::make('interest_id')
                                ->required()
                                ->relationship('interest', 'name'),
                        Forms\Components\Select::make('is_general')
                            ->required()
                            ->boolean(),
                        ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('interest.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_general')
                    ->label('Is general')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        1 => 'Yes',
                        0 => 'No',
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }    
}
