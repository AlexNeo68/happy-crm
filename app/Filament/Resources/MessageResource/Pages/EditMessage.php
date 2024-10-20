<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use App\Traits\RedirectToIndex;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use OpenAI\Laravel\Facades\OpenAI;

class EditMessage extends EditRecord
{
    use RedirectToIndex;
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('generateMessage')
                ->fillForm(fn()=>[
                    'message' => $this->generateMessage()
                ])
                ->form([
                    Textarea::make('message')->disabled(),
                ])
                ->modalSubmitAction(false)
                ->modalCancelAction(fn(Actions\StaticAction $action) => $action->label('Close'))
        ];
    }

    private function generateMessage(): string
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'system', 'content' => 'You are an assistant for a small business!'],
                ['role' => 'user', 'content' => 'This is the message: ' . $this->record->details],
            ],
        ]);

        return $result->choices[0]->message->content;
    }
}
