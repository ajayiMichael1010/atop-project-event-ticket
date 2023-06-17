<x-app-layout xmlns="http://www.w3.org/1999/html">

   <div class="container mt-3 bg-light">
       <div class="row">
           <div class="col-md-12 shadow p-3">
               <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                   <div class="carousel-inner">
                       <div class="carousel-item active" data-bs-interval="30000">
                           <img src="{{$estates[0]->estate_image}}" class="d-block w-100" alt="...">
                           <div class="carousel-caption d-none d-md-block">
                               <h1 style="font-size: 30px" class="uppercase">Welcome to </h1>
                               <p><span>PRIME HOME ESTATE</span></p>
                           </div>
                       </div>

                       @foreach($estates as $estate)
                           <div class="carousel-item" data-bs-interval="30000">
                               <img src="{{$estate->estate_image}}" class="d-block w-100" alt="...">
                               <div class="carousel-caption d-none d-md-block">
                                   <h1 style="font-size: 30px" class="uppercase">Welcome to </h1>
                                   <p><span>PRIME HOME ESTATE</span></p>
                               </div>
                           </div>
                       @endforeach

                   </div>
                   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Previous</span>
                   </button>
                   <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Next</span>
                   </button>
               </div>
           </div>
           <div class="bg-light">
               <div class="count-down-display text-center">
                   <div class="d-flex align-items-center justify-content-center">
                       <div class="event-promotion-caption">
                           <span class="font-size-two">PURCHASE TICKET FOR OUR UPCOMING EVENT </span><span class="goldenrod font-size-one">AND ALSO</span><br>
                           <span class="font-size-two">ACQUIRE A RAFFLE TICKET <span class="goldenrod font-size-one">FOR A CHANCE</span> TO WIN A 2-BEDROOM FLAT <span class="goldenrod font-size-one">AT</span> PRIME HOME ESTATE</span><br>
                           <span class="font-size-one goldenrod">DURING</span>  <span class="font-size-two"> THE EVENT</span>
                       </div>
                   </div>
                   <div class="countdown-container mt-3">
                       <div class="bg-goldenrod"><span>COUNTDOWN TO THE EVENT</span></div>
                       <div id="countdowntimer"></div>
                   </div>
               </div>
           </div>

       </div>

       @foreach($events as $event)
           <div class="row align-items-center justify-content-center mt-3" id="ticketShowcase">
               <div class="col-md-7 shadow-sm p-3">
                   <div class="row align-items-center justify-content-center">
                       <div class="col-md-6">
                           <img src ="{{$event['eventImageUrl']}}"/>
                       </div>
                       <div class="col-md-6">
                           <h2 class="uppercase text-gray-700 lead" style="font-size: 22px;"><b>{{$event['eventTitle']}}</b></h2>
                           <p><span class="goldenrod">Venue</span>: {{$event['eventVenue']}}</p>
                           <p><span class="goldenrod">Date</span>: {{$event['eventDate']}}</p>
                           <p><span class="goldenrod">Ticket</span>: {{$event['eventCharges']}}{!!$defaultCurrencySymbol!!}</p>
                           <br>
                           <a type="button" class="btn btn-primary goldenrod"
                              href="{{route("getTicketForm",[$event["id"]])}}">
                               <b>Buy Ticket</b>
                           </a>
                       </div>
                   </div>

               </div>
           </div>
       @endforeach

   </div>

    <script>

        // Set the date we're counting down to
        var countDownDate = new Date("July 29, 2023 21:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("countdowntimer").innerHTML = days + "D : " + hours + "H : "
                + minutes + "M : " + seconds + "S ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdowntimer").innerHTML = "EXPIRED";
            }
        }, 1000);

    </script>

</x-app-layout>
