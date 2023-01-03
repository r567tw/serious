<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CourseOverview extends BaseWidget
{
    protected int|string|array $columnSpan = [
        'md' => 3,
        'xl' => 3,
    ];

    protected function getColumns(): int
    {
        return 3;
    }

    protected function getCards(): array
    {
        return [
            Card::make('Totoal Course', \App\Models\Course::count()),
            Card::make('Totoal Voted', \App\Models\Vote::count()),
            Card::make('Totoal User', \App\Models\User::count()),
        ];
    }
}
