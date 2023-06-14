<x-app-layout>

    <div class="row align-items-center justify-content-center">
        <div class="col-md-6 mt-3">
            <div class="text-center">
                <span class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{$event['eventTitle']}} Ticket<br>
            </span>
                <span class="goldenrod leading-tight text-center">Kindly fill the form below to purchase your ticket</span>

            </div>


            <form method="POST" class="p-4" id="ticketForm">
                @csrf

                <input type="hidden" name="chargesPerTicket" value="{{$event['eventCharges']}}"/>
                <input type="hidden" name="eventId" value="{{$event['id']}}"/>

                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="fullName" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')" required autofocus autocomplete="fullName" />
                    <x-input-error :messages="$errors->get('fullName')" class="mt-2" />
                </div>

                <!-- Email-->
                <div class="mt-4">
                    <x-input-label for="eventVenue" :value="__('Email')" />
                    <x-text-input id="eventVenue" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="eventVenue" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Phone Number-->
                <div class="mt-4">
                    <x-input-label for="phoneNumber" :value="__('phoneNumber')" />
                    <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')" required autocomplete="phoneNumber" />
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
                            <x-text-input id="numberOfTickets" class="block mt-1 w-full" type="number" min="1" name="totalTickets" value="1" required autocomplete="totalTickets" />
                            <x-input-error :messages="$errors->get('totalTickets')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4">
                            <x-input-label for="transactionCurrency" :value="__('Transaction Currency')" />

                            <select id ="transactionCurrency" name="currencyType" required class="mb-4 form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                               <option value="">Select Prefer Currency</option>
                                @foreach($currencyTypes as $currencyType)
                                    <option value="{{$currencyType['shortName']}}">{{$currencyType['name']}}({!!$currencyType['symbol']!!})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-light">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Number of Tickets</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody id="chargesDetails">
                                </tbody>
                            </table>

                            <!-- LOADER -->
                            <div class="spinner-border" role="status" id="ticketCalculation">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <!-- LOADER ENDS -->
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Continue') }} &nbsp;
                         <span id="submitLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </x-primary-button>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>


<script>
    function convertCurrency(){
        selectElement("#ticketCalculation").style.display = "block";

        let amount = {{$event['eventCharges']}};
        let to = selectElement("#transactionCurrency").value;

        fetch("{{route('convertCurrency')}}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token if needed
            },
            body: JSON.stringify({
                amount: amount,
                to: to
            })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Request failed.');
                }
                return response.json();
            })
            .then(data => {
                let currencySymbol = data.currencyType.symbol;

                let numOfTickets = selectElement("#numberOfTickets").value;

                let amount = data.convertedAmount;
                let totalAmount = amount*numOfTickets;

                 amount = amount.toLocaleString();
                 totalAmount = totalAmount.toLocaleString()

                let chargesDetails =`<tr>
                    <td>${numOfTickets}</td>
                    <td>${currencySymbol}${amount}</td>
                    <td>${currencySymbol}${totalAmount}</td>
                    </tr>`;
                selectElement("#chargesDetails").innerHTML=chargesDetails;

                selectElement("#ticketCalculation").style.display = "none";
            })
            .catch(error => {
                console.log(error);

                selectElement("#ticketCalculation").style.display = "none";
            });
    }


    selectElement("#transactionCurrency").addEventListener("change",function(){
        convertCurrency();
    })

    selectElement("#numberOfTickets").addEventListener("change",function(){
        convertCurrency();
    })

</script>


<script>
    // Get the form element
    const form = selectElement("#ticketForm");

    // Add an event listener for form submission
    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent the default form submission
        selectElement("#submitLoader").style.display="block";

        // Create a FormData object to store the form data
        const formData = new FormData(form);

        // Create an object to store additional request options
        const options = {
            method: 'POST',
            body: formData
        };

        // Send the form data using the Fetch API
        fetch('{{route('buyTicket')}}', options)
            .then(response => response.json())
            .then(data => {
                console.log(data)
                localStorage.setItem("eventTicketInvoice", JSON.stringify(data))
                selectElement("#submitLoader").style.display="none";

                window.location.href= "{{route('getTicketInvoice')}}";

            })
            .catch(error => {
                // Handle any errors that occurred during the fetch request
               console.log('Error: '+ error);
               console.log(error)

                selectElement("#submitLoader").style.display="none";
            });
    });

</script>

