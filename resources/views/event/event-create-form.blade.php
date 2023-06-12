<x-app-layout>

    <div class="row align-items-center justify-content-center">
        <div class="col-md-5 mt-3">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{$pageTitle}}
            </h2>

            <form method="POST" action="{{ route('event.store') }}" class="p-4" enctype='multipart/form-data'>
                @csrf
                <!-- Event Title -->
                <div>
                    <x-input-label for="name" :value="__('Event Title')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="eventTitle" :value="old('eventTitle')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('eventTitle')" class="mt-2" />
                </div>

                <!-- Event Venue -->
                <div class="mt-4">
                    <x-input-label for="eventVenue" :value="__('Event Venue')" />
                    <x-text-input id="eventVenue" class="block mt-1 w-full" type="text" name="eventVenue" :value="old('eventVenue')" required autocomplete="eventVenue" />
                    <x-input-error :messages="$errors->get('eventVenue')" class="mt-2" />
                </div>

                <!-- Event Date -->
                <div class="mt-4">
                    <x-input-label for="eventDate" :value="__('Event Date')" />

                    <x-text-input id="eventDate" class="block mt-1 w-full"
                                  type="date"
                                  name="eventDate" :value="old('eventDate')"
                                  required autocomplete="New-event" />

                    <x-input-error :messages="$errors->get('eventDate')" class="mt-2" />
                </div>

                <!-- Event Description -->
                <div class="mt-4">
                    <x-input-label for="eventDescription" :value="__('Event Description')" />

                    <x-text-input id="eventDescription" class="block mt-1 w-full"
                                  type="text"
                                  name="eventDescription"
                                  required autocomplete="event-description"
                                  :value="old('eventDescription')"
                    />

                    <x-input-error :messages="$errors->get('event-description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="eventDescription" :value="__('Venue Capacity')" />

                    <x-text-input id="venue-capacity" class="block mt-1 w-full"
                                  type="text"
                                  name="eventVenueCapacity"
                                  required autocomplete="venue-capacity"
                                  :value="old('eventVenueCapacity')"
                    />

                    <x-input-error :messages="$errors->get('venue-capacity')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="eventDescription" :value="__('Organizer')" />

                    <x-text-input id="eventDescription" class="block mt-1 w-full"
                                  type="text"
                                  name="eventOrganizer"
                                  required autocomplete="organizer"
                                  :value="old('eventOrganizer')"
                    />

                    <x-input-error :messages="$errors->get('organizer')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="eventCharges" :value="__('Charges Per Ticket')" />

                    <x-text-input id="eventCharges" class="block mt-1 w-full"
                                  type="text"
                                  name="eventCharges"
                                  required autocomplete=""
                                  :value="old('eventCharges')"
                    />

                    <x-input-error :messages="$errors->get('event-charges')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="eventType" :value="__('Event Type')" />

                    <x-text-input id="eventType" class="block mt-1 w-full"
                                  type="text"
                                  name="eventType"
                                  required autocomplete="event-type"
                                  :value="old('eventType')"
                    />

                    <x-input-error :messages="$errors->get('event-type')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="eventImage" :value="__('Event Image')" />

                    <x-text-input id="eventImage" class="block mt-1 w-full"
                                  type="file"
                                  name="eventImage" required autocomplete="event-image" />

                    <x-input-error :messages="$errors->get('event-image')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="venueImage" :value="__('Venue Image')" />

                    <x-text-input id="venueImage" class="block mt-1 w-full"
                                  type="file"
                                  name="eventVenueImage" autocomplete="venue-image" />

                    <x-input-error :messages="$errors->get('venue-image')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Register Event') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
