<x-filament-widgets::widget>
    @if($trialEndsAt)
        <x-filament::section >
            <div class="flex justify-between items-center">
                <p>Your trial period is expired throw {{$trialEndsAt->diffForHumans(['parts' => 2, 'join'=>', ', 'skip'=>'week'])}}.</p>
                <x-filament::button wire:click="subscribe">Subscribe now</x-filament::button>
            </div>
        </x-filament::section>
    @elseif($subscriptionEndsAt)
        <p>Your subscription end at {{$subscriptionEndsAt->diffForHumans(['parts' => 2, 'join'=>', ', 'skip'=>'week'])}}.</p>
    @else
        <x-filament::section >
            <div class="flex justify-between items-center">
                <p>Your renews period is {{$subscriptionRenewsAt->diffForHumans(['parts' => 2, 'join'=>', ', 'skip'=>'week'])}}.</p>
                <x-filament::button wire:click="cancel" wire:confirm="Are your shure?">Cancel</x-filament::button>
            </div>
        </x-filament::section>

    @endif


</x-filament-widgets::widget>
