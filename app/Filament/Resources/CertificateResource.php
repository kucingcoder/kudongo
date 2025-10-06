<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-qr-code';

    protected static ?string $navigationLabel = 'Certificates';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(64)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\Textarea::make('description')
                                    ->required()
                                    ->maxLength(120),

                                FileUpload::make('thumbnail')
                                    ->required()
                                    ->image()
                                    ->disk('public')
                                    ->directory('certificate-thumbnails'),
                            ])
                            ->columnSpan(2),

                        Forms\Components\Section::make()
                            ->schema([
                                FileUpload::make('file')
                                    ->required()
                                    ->disk('public')
                                    ->directory('certificate-files')
                                    ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpeg']),

                                Forms\Components\Select::make('file_type')
                                    ->required()
                                    ->options([
                                        'pdf' => 'PDF',
                                        'png' => 'PNG',
                                        'jpg' => 'JPG',
                                        'jpeg' => 'JPEG',
                                    ])
                                    ->native(false),

                                Forms\Components\Select::make('file_orientation')
                                    ->required()
                                    ->options([
                                        'portrait' => 'Portrait',
                                        'landscape' => 'Landscape',
                                    ])
                                    ->native(false),
                            ])
                            ->columnSpan(1),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_type')
                    ->badge(),
                Tables\Columns\TextColumn::make('file_orientation'),
            ])
            ->filters([
                //
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
