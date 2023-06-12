<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            #countdowntimer {
                text-align: center;
                font-size: 20px;
                margin-top: 0px;
                color:#fff;
                border: 2px dashed #ffffff;
                padding: 5px;
                top:15px;left: 15px
            }
            @media(min-width: 768px){
                #countdowntimer {
                    text-align: center;
                    font-size: 56px;
                    margin-top: 0px;
                    color:#fff;
                }
            }

            .goldenrod{color: goldenrod}
            .bg-goldenrod{background-color: goldenrod}
            p{
                line-height: 1.9rem;
            }

        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @if(Auth::user())
            @include('layouts.navigation')
            @else
                @include('layouts.custom-navigation')
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

                <footer class="mt-3">
                    <div class="bg-goldenrod p-4">
                        <div class="container text-center" style="color: #374151;">
                            <div class="row ">

                                <div class="col-md-6 mt-3">
                                    <h2 style="font-size: 18px;">
                                        Nollywood Film Festival Germany &<br> Nega Awards Gala Nite
                                    </h2>
                                    <p><span><b>VENUE</b></span>: Burgerzentrum-Ulrich-Strabe 9, 64331 &nbsp; </p>
                                    <p><span><b>DATE</b></span>: 2023-07-29</p>

                                </div>
                                <div class="col-md-6 mt-3">
                                    <h2 style="font-size: 18px;">
                                        Opening Film Screening
                                    </h2>
                                    <p><span><b>VENUE</b></span>: Emmerich-Josef-Str 46A 65929 FrankFurt Am Main</p>
                                    <p><span><b>DATE</b></span>: 2023-07-28</p>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="bg-light p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">
                                    <p class="float-end"><a href="#">Back to top</a></p>
                                    <p>&copy; 2023 Atop Projects Ltd</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="resources/js/countdown.js"></script>


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
    </body>
</html>
