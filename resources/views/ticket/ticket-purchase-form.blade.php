<x-app-layout>

    <div class="row align-items-center justify-content-center">
        <div class="col-md-6 mt-3">
            <div class="text-center">
                <span class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{$event['eventTitle']}} Ticket<br>
            </span>
                <span class="goldenrod leading-tight text-center">Kindly fill the form below to purchase your ticket</span>

            </div>


            <form method="POST" action="{{ route('event.store') }}" class="p-4" enctype='multipart/form-data'>
                @csrf
                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('fullName')" class="mt-2" />
                </div>

                <!-- Email-->
                <div class="mt-4">
                    <x-input-label for="eventVenue" :value="__('Email')" />
                    <x-text-input id="eventVenue" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autocomplete="eventVenue" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Phone Number-->
                <div class="mt-4">
                    <x-input-label for="phoneNumber" :value="__('phoneNumber')" />
                    <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="text" :value="old('phoneNumber')" required autocomplete="phoneNumber" />
                    <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Country -->
                        <div class="mt-4">
                            <x-input-label for="eventDate" :value="__('Country')" />

                            <select name="country" required class="mb-4 form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach($countries as $country)
                                    <option value="{{$country['Country']}}">
                                        {{$country['Country']}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- City -->
                        <div class="mt-4">
                            <x-input-label for="city" :value="__('City')" />

                            <x-text-input id="city" class="mb-4 form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                          type="text"
                                          name="city"
                                          required autocomplete="city"
                                          :value="old('city')"
                            />

                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Number of Tickets -->
                        <div class="mt-4">
                            <x-input-label for="numberOfTickets" :value="__('How Many Tickets ?')" />
                            <x-text-input id="eventVenue" class="block mt-1 w-full" type="number" name="totalTickets" :value="old('totalTickets')" required autocomplete="totalTickets" />
                            <x-input-error :messages="$errors->get('totalTickets')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4">
                            <x-input-label for="transactionCurrency" :value="__('Transaction Currency')" />

                            <select name="transactionCurrency" required class="mb-4 form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach($currencyTypes as $currencyType)
                                    <option value="{{$currencyType['shortName']}}">{{$currencyType['name']}}({!!$currencyType['symbol']!!})</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Continue') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

