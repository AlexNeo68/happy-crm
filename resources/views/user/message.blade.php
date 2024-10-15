<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-white text-4xl uppercase text-center mb-4">Send to user message</h1>

    <form method="POST" action="" class="flex flex-col gap-4">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="details" :value="__('Details')" />
            <x-textarea-input id="details" name="details" class="block mt-1 w-full"  :value="old('details')" />
            <x-input-error :messages="$errors->get('details')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="w-full justify-center">
                {{ __('Send Message') }}
            </x-primary-button>
        </div>



    </form>
</x-guest-layout>
