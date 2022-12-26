<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CourseOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.course-resource.widgets.course-overview';

    public $count = 10;

    protected function getCards(): array
    {
        return [
            Card::make('Totoal Course', \App\Models\Course::count()),
            Card::make('Totoal User', \App\Models\User::count()),
            Card::make('Average time on page', '3:12'),
        ];
    }
    
}
