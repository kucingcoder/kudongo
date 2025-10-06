<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectGalleryResource\Pages;
use App\Models\ProjectGallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ProjectGalleryResource extends Resource
{
    protected static ?string $model = ProjectGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Project Galleries';

    protected static ?string $navigationGroup = 'Projects';

    protected static ?int $navigationSort = 8;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_project')
                    ->relationship('project', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                FileUpload::make('image')
                    ->required()
                    ->image()
                    ->disk('public')
                    ->directory('project-galleries')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('project.name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectGalleries::route('/'),
            'create' => Pages\CreateProjectGallery::route('/create'),
            'edit' => Pages\EditProjectGallery::route('/{record}/edit'),
        ];
    }
}
