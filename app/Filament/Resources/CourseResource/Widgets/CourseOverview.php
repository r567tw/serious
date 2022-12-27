<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CourseOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Totoal Course', \App\Models\Course::count()),
        ];
    }
}
