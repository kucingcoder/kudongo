<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialMediaClick;
use App\Models\WebVisitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description('All projects created')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Total Skills', Skill::count())
                ->description('All skills listed')
                ->color('warning')
                ->chart([17, 14, 15, 3, 10, 2, 7]),

            Stat::make('Social Media Clicks', SocialMediaClick::count())
                ->description('Total clicks from all platforms')
                ->color('info')
                ->chart([10, 3, 15, 4, 17, 2, 9]),
        ];
    }
}
