<x-app-layout>

    <div class="row align-items-center justify-content-center">
        <div class="col-md-5 mt-3">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{$pageTitle}}
            </h2>

            <form method="POST" action="{{ route('estate.store') }}" class="p-4" enctype='multipart/form-data'>
                @csrf
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Event Venue -->
                <div class="mt-4">
                    <x-input-label for="estateTitle" :value="__('Estate Title')" />
                    <x-text-input id="estateTitle" class="block mt-1 w-full" type="text" name="estateTitle" :value="old('estateTitle')" required autocomplete="estateTitle" />
                    <x-input-error :messages="$errors->get('estateTitle')" class="mt-2" />
                </div>

                <!-- Event Date -->
                <div class="mt-4">
                    <x-input-label for="eventDate" :value="__('Estate Description')" />

                    <x-text-input id="eventDate" class="block mt-1 w-full"
                                  type="text"
                                  name="estateDescription" :value="old('estateDescription')"
                                  required autocomplete="New-event" />

                    <x-input-error :messages="$errors->get('estateDescription')" class="mt-2" />
                </div>

                <!-- Event Description -->
                <div class="mt-4">
                    <x-input-label for="estatePrice" :value="__('Estate Price')" />

                    <x-text-input id="estatePrice" class="block mt-1 w-full"
                                  type="text"
                                  name="estatePrice"
                                  required autocomplete="estate-price"
                                  :value="old('estatePrice')"
                    />

                    <x-input-error :messages="$errors->get('estate-price')" class="mt-2" />
                </div>

                <!-- Event Title -->
                <div>
                    <x-input-label for="estateImage" :value="__('Estate Image')" />
                    <x-text-input id="estateImage" class="block mt-1 w-full" type="file" name="estateImage" :value="old('estateImage')" required autofocus autocomplete="estateImage" />
                    <x-input-error :messages="$errors->get('estateImage')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Add Estate') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
