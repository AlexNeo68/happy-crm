<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{route('appointment.submit', $user)}}" class="flex flex-col gap-4">
        @csrf

        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"  />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"  />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autofocus />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="service" :value="__('Service')" />
            <x-select-input id="service" name="service_id" :value="old('service')" class="block mt-1 w-full">
                <option value="">{{__('Choose service')}}</option>
                @foreach($user->services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('service')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="starts_at" :value="__('Starts at')" />
            <x-text-input id="starts_at" class="block mt-1 w-full" type="date" name="starts_at" :value="old('starts_at')" autofocus />
            <x-input-error :messages="$errors->get('starts_at')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="additional_notes" :value="__('Additional Notes')" />
            <x-textarea-input id="additional_notes" name="additional_notes" class="block mt-1 w-full"  :value="old('additional_notes')" />
            <x-input-error :messages="$errors->get('additional_notes')" class="mt-2" />
        </div>

        <div>
            <x-primary-button>
                {{ __('Send Message') }}
            </x-primary-button>
        </div>



    </form>
</x-guest-layout>
