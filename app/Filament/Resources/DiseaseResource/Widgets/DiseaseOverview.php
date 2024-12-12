<?php

namespace App\Filament\Resources\DiseaseResource\Widgets;

use App\Models\Allergy;
use App\Models\Avoid;
use App\Models\Disease;
use App\Models\Favorite;
use App\Models\Interest;
use App\Models\Menu;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DiseaseOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Interests', Interest::count())
            ->description('All interests')
            ->icon('heroicon-o-sparkles'),

            Card::make('Total Diseases', Disease::count())
                ->description('All diseases')
                ->icon('heroicon-o-x-circle'),

            Card::make('Total Allergy', Allergy::count())
                ->description('All allergies')
                ->icon('heroicon-o-minus-circle'),

            Card::make('Total Favorite', Favorite::count())
                ->description('All favorites')
                ->icon('heroicon-o-badge-check'),

            Card::make('Total Menu', Menu::count())
                ->description('All menus')
                ->icon('heroicon-o-cake'),
                
            Card::make('Total Avoids', Avoid::count())
                ->description('All avoids')
                ->icon('heroicon-o-x-circle'),
        ];
    }
}
