<?php

namespace App\Filament\Widgets;

use App\Models\SocialMedia;
use App\Models\SocialMediaClick;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class SocialMediaClickBreakdown extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Social Media Click Breakdown';

    protected int $totalClicks;

    public function __construct()
    {
        $this->totalClicks = SocialMediaClick::count();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                SocialMedia::query()
                    ->withCount('socialMediaClicks')
                    ->orderBy('social_media_clicks_count', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Social Media'),

                Tables\Columns\TextColumn::make('social_media_clicks_count')
                    ->label('Total Clicks')
                    ->sortable(),

                Tables\Columns\TextColumn::make('percentage')
                    ->label('Percentage')
                    ->formatStateUsing(function ($record) {
                        if ($this->totalClicks === 0) {
                            return '0.00%';
                        }
                        $percentage = ($record->social_media_clicks_count / $this->totalClicks) * 100;
                        return number_format($percentage, 2) . '%';
                    }),
            ]);
    }
}
