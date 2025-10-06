<?php

namespace App\Filament\Resources\ProjectGalleryResource\Pages;

use App\Filament\Resources\ProjectGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectGallery extends EditRecord
{
    protected static string $resource = ProjectGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
