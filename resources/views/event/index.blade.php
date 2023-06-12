<x-app-layout xmlns="http://www.w3.org/1999/html">

   <div class="container mt-3 shadow">
       <div class="row">
           <div class="col-md-12 shadow-sm p-3 bg-goldenrod">
{{--               <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">--}}
{{--                   <div class="carousel-inner">--}}
{{--                       <div class="carousel-item active" data-bs-interval="30000">--}}
{{--                           <img src="https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686562320/unhmsxy1mrgf6qhg1hcu.jpg" class="d-block w-100" alt="...">--}}
{{--                           <div class="carousel-caption d-none d-md-block">--}}
{{--                               <h1 style="font-size: 30px" class="uppercase">Nollywood Film Festival Germany &<br> Nega Awards Gala Nite</h1>--}}
{{--                               <p><span><b>VENUE</b></span>: Burgerzentrum-Ulrich-Strabe 9, 64331 &nbsp; <span><b>DATE</b></span> : 2023-07-29</p>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                       <div class="carousel-item" data-bs-interval="30000">--}}
{{--                           <img src="https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686562320/unhmsxy1mrgf6qhg1hcu.jpg" class="d-block w-100" alt="...">--}}
{{--                           <div class="carousel-caption d-none d-md-block">--}}
{{--                               <h1 style="font-size: 30px" class="uppercase">Opening Film Screening</h1>--}}
{{--                               <p><span><b>VENUE</b></span>: Emmerich-Josef-Str 46A 65929 FrankFurt Am Main &nbsp; <span><b>DATE</b></span> : 2023-07-28</p>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--                   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">--}}
{{--                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                       <span class="visually-hidden">Previous</span>--}}
{{--                   </button>--}}
{{--                   <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">--}}
{{--                       <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                       <span class="visually-hidden">Next</span>--}}
{{--                   </button>--}}
{{--               </div>--}}
               <h1 class="text-center display-5 uppercase">Upcoming Event</h1>
               <div class="countdown-container">
                   <div id="countdowntimer"></div>
               </div>
           </div>
       </div>

       @foreach($events as $event)
           <div class="row align-items-center justify-content-center mt-3">
               <div class="col-md-7 shadow-sm p-3">
                   <div class="row align-items-center justify-content-center">
                       <div class="col-md-6">
                           <img src ="{{$event['eventImageUrl']}}"/>
                       </div>
                       <div class="col-md-6">
                           <h2 class="uppercase text-gray-700 lead" style="font-size: 22px;font-weight: 900;"><b>{{$event['eventTitle']}}</b></h2>
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


    </footer>

</x-app-layout>
