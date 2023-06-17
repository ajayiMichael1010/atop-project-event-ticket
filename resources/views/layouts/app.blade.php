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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

            .font-size-one{
                font-size: 1.3rem;
                font-weight: 100;
            }
            .font-size-two{
                font-size: 1.3rem;
                font-weight: 100;
            }

            #top{
                background-color: goldenrod;
                border-radius: 50%;
                width: 25px;
                height: 25px;
                float: right;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .footer-main-color{
                background-color: #808080;
                color: #fff;
            }

            footer h2{
                margin-bottom: 10px;
                color: #fff;
            }

            footer p{
                font-size: 0.9rem;
                line-height: 1.5rem;
                color: #fff;
            }
            .footer-content-wrapper{
                width:300px;
                border-bottom: 1px dashed #fdad00; ;
            }
            .countdown-text{
                display: none;
            }
            .count-down-display{
                color: #1f2937;
                font-weight: bold;
                opacity: 0.8;
                background-color: #fff;
            }


            #countdowntimer {
                text-align: center;
                font-size: 30px;
                margin-top: 0px;
                color:#1f2937;
                border: 2px dashed #fdad00;
            }
            @media(min-width: 768px){
                #countdowntimer {
                    text-align: center;
                    font-size: 40px;
                    margin-top: 0px;
                }

                .count-down-display{
                    color: #1f2937;
                }

                .countdown-text{
                    display: block;
                    background-color: #fff;
                }

                .footer-content-wrapper{
                    border:none;
                }
            }
            #ticketCalculation,#submitLoader{
                display: none;
            }

            .goldenrod{color: #fdad00}
            .bg-goldenrod{background-color: #fdad00}
            p{
                line-height: 1.9rem;
            }

            .btn-color{
                background-color: #fdad00 !important;
                color: #fff;
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
                    <div class="footer-main-color p-4">
                        <div class="container" style="color: #374151;">
                            <div class="row ">

                                <div class="col-md-4 mt-3 d-flex  justify-content-center">
                                    <div class="footer-content-wrapper">
                                        <h2 style="font-size: 18px;">
                                            Nollywood Film Festival Germany &<br> Nega Awards Gala Nite
                                        </h2>
                                        <p><span><b>VENUE</b></span>: Burgerzentrum Carl-Ulrich-Strabe 9, 64331 Weiterstadt (FRANKFURT, GERMANY)
                                            3-mins from Weiterstadt HBF Training -Station &nbsp; </p>
                                        <p><span><b>DATE</b></span>: 2023-07-29</p>
                                    </div>


                                </div>
                                <div class="col-md-4 mt-3 d-flex  justify-content-center">
                                    <div class="footer-content-wrapper">
                                        <h2 style="font-size: 18px;">
                                            Opening Film Screening
                                        </h2>
                                        <p><span><b>VENUE</b></span>: HOCHST Cinema,
                                            Emmerich-Joseph-str , 46A65929 Frankfurt AM Main</p>
                                        <p><span><b>DATE</b></span>: 2023-07-28</p>
                                    </div>


                                </div>

                                <div class="col-md-4 mt-3 d-flex justify-content-center">
                                    <div class="footer-content-wrapper">
                                        <h2 style="font-size: 18px;">
                                            Our Bank Details
                                        </h2>
                                        <p><span><b>ACCOUNT NAME</b></span>: ATOP PROJECTS LTD</p>
                                        <p><span><b>BANK NAME</b></span>: FIDELITY BANK</p>
                                        <p><span><b>NAIRA ACCOUNT</b></span>: 5620179182</p>
                                        <p><span><b>DOLLAR ACCOUNT</b></span>: 5250398933</p>
                                        <p><span><b>EURO ACCOUNT</b></span>: 5250398957</p>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="bg-light p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">
                                    <div id="top"><p class="float-end"><a href="#">&#8593;</a></p></div>
                                    <p class="goldenrod">&copy; 2023 Atop Projects Ltd</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script>
            function selectElement(el){
                return document.querySelector(el);
            }
        </script>
        </div>
    </body>

</html>
