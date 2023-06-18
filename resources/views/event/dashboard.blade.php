<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$pageTitle}}
        </h2>
    </x-slot>

    <div class="container shadow mt-5 p-4">
        <div class="row">
            <div class="col-md-12">
                <h5 class="display-5 text-center">{{$pageTitle}}</h5>
                <div class="table-responsive">
                    <table class="table table-responsive table-bordered table-striped mt-3">
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Ticket ID</th>
                            <th>Description</th>
                            <th>Total Tickets</th>
                            <th>Unit Price</th>
                            <th>Total Charges</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ticketOrders as $orders)
                            <tr>
                                <td>{{$orders['userDetails']['full_name']}}</td>
                                <td>{{$orders['userDetails']['email']}}</td>
                                <td>{{$orders['userDetails']['country']}}</td>
                                <td>{{$orders['userDetails']['city']}}</td>
                                <td>{{$orders['ticketOrderRef']}}</td>
                                <td>{{$orders['eventDetails']['event_title']}}</td>
                                <td>{{$orders['totalTickets']}}</td>
                                <td>{!!$orders['chargesPerTicket']!!}</td>
                                <td>{!!$orders['totalCharges']!!}</td>
                                <td class="isPaymentConfirmedStatus">{{$orders['isPaymentConfirmedStatus']}}</td>
                                <td>
                                    <input
                                        class="isPaymentConfirmed"
                                        type="checkbox"
                                        value=""
                                        {{$orders['isChecked']}}
                                        data-ticketid="{{$orders['id']}}"
                                    >
                                </td>
                                <td>
                                    <button class="sendTicket btn btn-primary" data-ticketid="{{$orders['id']}}">Send Ticket
                                        <span class="spinner-border spinner-border-sm submitLoader" role="status" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12" style="padding:20px;">
                    <!---PAGA NUMBERS -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // CONFIRM PAYMENT
    let isPaymentConfirmed = document.getElementsByClassName("isPaymentConfirmed");

    for (let i = 0; i < isPaymentConfirmed.length; i++) {
        isPaymentConfirmed[i].addEventListener('click', function () {
            let ticketId = this.getAttribute("data-ticketid");
            let isPaymentConfirmedStatus = this.closest("tr").querySelector(".isPaymentConfirmedStatus");

            // Send the form data using the Fetch API
            fetch("{{config('app.url')}}/api/update-payment-confirmation/" + ticketId, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token if needed
                },
                body: JSON.stringify({
                    "ticketId": ticketId,
                })
            })
                .then(response => response.json())
                .then(data => {
                    isPaymentConfirmedStatus.innerHTML = data ? "Confirmed" : "Not Confirmed";
                })
                .catch(error => {
                    console.log(error);
                });
        });
    }

    // SEND TICKET
    let sendTicket = document.getElementsByClassName("sendTicket");
    for (let i = 0; i < sendTicket.length; i++) {
        let submitLoader = sendTicket[i].querySelector(".submitLoader");
        submitLoader.style.display = "none";

        sendTicket[i].addEventListener('click', function () {
            let ticketId = this.getAttribute("data-ticketid");
            submitLoader.style.display = "block";

            // Send the form data using the Fetch API
            fetch("{{config('app.url')}}/api/send-ticket/" + ticketId, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token if needed
                },
            })
                .then(response => response.json())
                .then(data => {
                    submitLoader.style.display = "none";
                })
                .catch(error => {
                    console.log(error);
                    submitLoader.style.display = "none";
                });
        });
    }
</script>
