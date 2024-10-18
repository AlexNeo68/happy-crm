<?php

namespace App\Livewire;

use Carbon\Carbon;
use Filament\Widgets\Widget;

class Subscription extends Widget
{

    protected int | string | array $columnSpan = 'full';

    public Carbon|string|null $trialEndsAt = null;
    public Carbon|string|null $subscriptionRenewsAt = null;
    public Carbon|string|null $subscriptionEndsAt = null;

    protected static string $view = 'livewire.subscription';

    public function mount():void
    {
        $this->trialEndsAt = auth()->user()->trial_ends_at;
        if(auth()->user()->subscription()) {
            $this->subscriptionEndsAt = auth()->user()->subscription()->ends_at;
        }

        if(!$this->trialEndsAt) {
            $this->subscriptionRenewsAt = Carbon::createFromTimestamp(auth()->user()->subscription()
                ->asStripeSubscription()
                ->current_period_end);
        }


//        dd(auth()->user()->subscription());
    }

    public function subscribe():void
    {
        auth()->user()
            ->newSubscription('default', 'price_1QATQbC9UH4rbBnef1fb3a9i')
            ->checkout([
                'success_url' => url('/dashboard'),
                'cancel_url' => url('/dashboard/settings/'),
            ]);
    }

    public function cancel():void
    {
        auth()->user()
            ->subscription()
            ->cancel();
    }
}
