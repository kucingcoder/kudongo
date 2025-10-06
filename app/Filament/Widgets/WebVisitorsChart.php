<?php

namespace App\Filament\Widgets;

use App\Models\WebVisitor;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class WebVisitorsChart extends ChartWidget
{
    protected static ?string $heading = 'Web Visitors';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(WebVisitor::class)
            ->between(
                start: now()->subDays(14),
                end: now(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
