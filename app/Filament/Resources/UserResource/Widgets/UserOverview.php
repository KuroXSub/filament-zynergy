<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::whereNot('email', 'like', '%@kuroxsub.my.id%')->count())
                ->description('Registered users')
                ->chart(User::query()
                    ->latest()
                    ->take(7)
                    ->pluck('id')
                    ->toArray())
                ->color($this->getColorBasedOnTrend(User::class))
                ->icon('heroicon-o-users'),
        ];
    }

    protected function getColorBasedOnTrend($modelClass): string
    {
        $today = $modelClass::whereDate('created_at', today())->count();
        $yesterday = $modelClass::whereDate('created_at', today()->subDay())->count();

        if ($today > $yesterday) {
            return 'success';
        } elseif ($today < $yesterday) {
            return 'danger';
        }
        return 'warning';
    }
}
