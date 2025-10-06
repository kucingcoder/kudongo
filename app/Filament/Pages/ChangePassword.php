<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static string $view = 'filament.pages.change-password';

    protected static ?string $title = 'Change Password';

    // This line hides the page from the main navigation menu
    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('current_password')
                    ->label('Current Password')
                    ->password()
                    ->required()
                    ->currentPassword(),

                TextInput::make('new_password')
                    ->label('New Password')
                    ->password()
                    ->required()
                    ->rule(Password::min(8)->mixedCase()->numbers())
                    ->different('current_password'),

                TextInput::make('new_password_confirmation')
                    ->label('Confirm New Password')
                    ->password()
                    ->required()
                    ->same('new_password'),
            ])
            ->statePath('data');
    }

    public function updatePassword()
    {
        $data = $this->form->getState();

        $user = User::find(Auth::id());

        $user->update([
            'password' => Hash::make($data['new_password']),
        ]);

        Notification::make()
            ->title('Password updated successfully')
            ->success()
            ->send();

        $this->form->fill();
    }
}
