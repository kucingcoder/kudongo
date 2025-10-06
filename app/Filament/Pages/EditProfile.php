<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'My Profile';
    protected static string $view = 'filament.pages.edit-profile';
    protected static ?int $navigationSort = 10;

    public ?array $data = [];

    public function mount(): void
    {
        $user = User::find(Auth::id());
        $this->form->fill($user->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Profile')
                    ->description('Update your personal information.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(64),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(table: User::class, ignoreRecord: true),
                    ])->columns(2),

                Section::make('Details')
                    ->schema([
                        TextInput::make('profession')
                            ->required()
                            ->maxLength(32),
                        Textarea::make('description')
                            ->required()
                            ->maxLength(300)
                            ->rows(4),
                        TextInput::make('phone')
                            ->required()
                            ->maxLength(16),
                        TextInput::make('address')
                            ->required(),
                        FileUpload::make('photo')
                            ->required()
                            ->image()
                            ->disk('public')
                            ->directory('user-photos'),
                    ]),
            ])
            ->model(Auth::user())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $user = User::find(Auth::id());
        $user->update($data);

        Notification::make()
            ->title('Profile updated successfully')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->submit('save'),
        ];
    }
}
