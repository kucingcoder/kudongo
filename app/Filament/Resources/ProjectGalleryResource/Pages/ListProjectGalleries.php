<?php

namespace App\Filament\Resources\ProjectGalleryResource\Pages;

use App\Filament\Resources\ProjectGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectGalleries extends ListRecords
{
    protected static string $resource = ProjectGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
