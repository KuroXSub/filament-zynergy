<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use App\Models\Article;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ArticleOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Articles', Article::count())
                ->description('All articles')
                ->icon('heroicon-o-document-text'),
    
            Card::make('Personalization Articles', Article::where('is_general', false)->count())
                ->description('Articles is personalization')
                ->color('success')
                ->icon('heroicon-o-document-remove'),
    
            Card::make('General Articles', Article::where('is_general', true)->count())
                ->description('Articles is general')
                ->color('success')
                ->icon('heroicon-o-document-add'),
        ];
    }
}
