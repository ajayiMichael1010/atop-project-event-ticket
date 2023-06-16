<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 shadow p-2">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="text-center">
                                <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                <p class="pt-0">Invoice</p>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">From: <span style="color:#5d9fc5 ;">ATOP Projects Ltd</span></li>
                                    <li class="text-muted">2, Church Street, off Asajon Street, Sangotedo</li>
                                    <li class="text-muted">Lagos, Nigeria</li>
                                    <li class="text-muted"><i class="fas fa-phone"></i> (+234) 0806 229 1780 </li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted" id="buyer">{{$order['userDetails']['full_name']}}</p>
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold invoiceId">{{$order['ticketOrderRef']}}</span></li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold" id="invoiceDate"></span></li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  Unpaid</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center mt-3">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" style="width: 40%">Description</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody id="invoiceDetails">
                                <tr>
                                    <td>{{$order['ticketOrderRef']}}</td>
                                    <td>{{$order['eventDetails']['event_title']}}</td>
                                    <td>{{$order['totalTickets']}}</td>
                                    <td>{!!$order['chargesPerTicket']!!}</td>
                                    <td>{!!$order['totalCharges']!!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <!--  <p class="ms-3">Kindly receipts should be forwarded our whatsapp lines: </p>-->

                            </div>
                            <div class="col-xl-4">
                                <p class="text-black float-start"><span class="text-black me-3">
                                            Total Amount</span>
                                    <span style="font-size: 25px;" class="totalCharges">{!!$order['totalCharges']!!}</span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Our Whatsapp numbers</p>
                                <span class="text-info">(+234) 0806 293 7553 / (+234) 703 368 8363 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
