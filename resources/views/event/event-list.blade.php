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
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                    <tr><th>Event Title</th>
                        <th>Event Venue</th>
                        <th>Event Charges</th>
                        <th>Event Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event['eventTitle']}}</td>
                            <td>{{$event['eventVenue']}}</td>
                            <td>{{$event['eventCharges']}}</td>
                            <td>{{$event['eventDate']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>

