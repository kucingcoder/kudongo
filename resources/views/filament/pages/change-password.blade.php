<x-filament-panels::page>
    <form wire:submit.prevent="updatePassword">
        {{ $this->form }}

        <br>
        <x-filament::button type="submit">
            Change Password
        </x-filament::button>
    </form>
</x-filament-panels::page>