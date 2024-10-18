<?php

namespace App\Filament\Pages;

use App\Livewire\Subscription;
use App\Models\Customer;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';
    protected static ?string $navigationGroup = 'User Settings';

    protected static string $view = 'filament.pages.settings';

    public ?array $settings = [];

    protected function getHeaderWidgets(): array
    {
        return [
            Subscription::class
        ];
    }

    public function __construct()
    {
        $this->settings['name'] = auth()->user()->name;
        $this->settings['email'] = auth()->user()->email;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->unique(ignorable: auth()->user())
                            ->required(),
                    ])
                    ->columns(2),
                ]),



            ])
            ->statePath('settings');
    }

    public function save()
    {
        $state = $this->form->getState();
        auth()->user()->update([
            'name' => $state['name'],
            'email' => $state['email'],
        ]);

        Notification::make()->success()->title('Saved!')->send();
    }
}
