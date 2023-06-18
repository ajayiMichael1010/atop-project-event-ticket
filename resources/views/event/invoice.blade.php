
<x-app-layout xmlns="http://www.w3.org/1999/html">
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 shadow p-2">

                        <div class="row d-flex align-items-baseline">
                            <div class="col-xl-9">
                                <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong><span id="invoiceId">ID: #123-123</span></strong></p>
                            </div>
                            <div class="col-xl-3 float-end">
                                <!--<a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                        class="fa fa-print text-primary"></i> Print</a>
                                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                        class="fa fa-file-pdf text-danger"></i> Save</a>-->
                            </div>
                            <hr>
                        </div>

                        <div class="container">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                    <p class="pt-0">Invoice</p>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-xl-8 mt-2">
                                    <ul class="list-unstyled">
                                        <li class="text-muted">From: <span style="color:#5d9fc5 ;">ATOP Projects Ltd</span></li>
                                        <li class="text-muted">2, Church Street, off Asajon Street, Sangotedo</li>
                                        <li class="text-muted">Lagos, Nigeria</li>
                                        <li class="text-muted"><i class="fa fa-phone" aria-hidden="true"></i> (+234) 0806 229 1780 </li>
                                    </ul>
                                </div>
                                <div class="col-xl-4 mt-2">
                                    <p class="text-muted" id="buyer"></p>
                                    <ul class="list-unstyled">
                                        <li class="text-muted"><i class="fa fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="fw-bold invoiceId"></span></li>
                                        <li class="text-muted"><i class="fa fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="fw-bold" id="invoiceDate"></span></li>
                                        <li class="text-muted"><i class="fa fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  Unpaid</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">
                                <div class="table-responsive">
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
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <!--  <p class="ms-3">Kindly receipts should be forwarded our whatsapp lines: </p>-->

                                </div>
                                <div class="col-xl-4">
                                    <p class="text-black float-start"><span class="text-black me-3">
                                            Total Amount</span>
                                        <span style="font-size: 25px;" class="totalCharges">$1221</span></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-10">
                                    <p>Our Whatsapp numbers</p>
                                    <i class="fa fa-phone" aria-hidden="true"></i> <span class="text-info">(+234) 0806 293 7553 / (+234) 703 368 8363 </span>
                                </div>
                                <div class="col-xl-2 mt-3">
                                    <button type="button" class="btn btn-primary text-capitalize"
                                            style="background-color:#60bdf3;"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" >Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include("event.admin-contact-modal");
</x-app-layout>

<script>

    let orderDetails = JSON.parse(localStorage.getItem("eventTicketInvoice"));
    console.log(orderDetails)
    let tbody = `<tr>
                        <td>1</td>
                        <td>${orderDetails.eventDetails.event_title}</td>
                        <td>${orderDetails.totalTickets}</td>
                        <td>${orderDetails.chargesPerTicket}</td>
                        <td>${orderDetails.totalCharges}</td>
                      </tr>`;
    selectElement("#invoiceDetails").innerHTML = tbody;
    selectElement(".invoiceId").innerHTML = "ID: #"+orderDetails.ticketOrderRef;
    selectElement("#invoiceId").innerHTML = "ID: #"+orderDetails.ticketOrderRef;
    selectElement("#invoiceDate").innerHTML = "Invoice Date:"+orderDetails.invoiceDate;
    selectElement(".totalCharges").innerHTML =`${orderDetails.totalCharges}`;

    selectElement("#buyer").innerHTML = `Invoice to: ${orderDetails.userDetails.full_name}`

    selectElement("#adminOne").setAttribute("href",`https://wa.me/+2348062937553?text=\n
    Full Name: ${orderDetails.userDetails.full_name} Email : ${orderDetails.userDetails.email}\n
    -------------------------------------------------------\n
    Invoice Id: *${orderDetails.ticketOrderRef}*\n
    Total Tickets : ${orderDetails.totalTickets}\n
    Total Charges : *${orderDetails.totalCharges}*\n
    Invoice Date ${orderDetails.invoiceDate}\n
    _____________________________________________________\n

 Kindly confirm my ticket and payment with invoice id ${orderDetails.ticketOrderRef}`)

</script>
