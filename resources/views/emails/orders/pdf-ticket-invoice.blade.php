
<style>
    #container{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    #header, .total-amount-caption{
        border-bottom: 1px solid #7e8d9f;
    }

    .total-amount-caption{
        width: 100%;
    }
    .total-amount-caption p{
        text-align: right;
    }

    #invoice-title{
        padding: 8px;
    }
    .invoice-size{
        width : 70%;
    }

    table {
        margin-top: 10px;
        width: 100%;
    }
    table.invoice-orders th , table.invoice-orders td {
        border:none;
        padding: 10px;
        margin: 0;
        text-align: center;
    }

    table.invoice-orders th{
        color: #fff;
    }
    table.invoice-orders td{
        background-color: #eeeeee;
    }

    ul{
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul li{
        line-height: 1.6rem;
    }

</style>


<div id="container">
    <div class="invoice-size">

        <div id="header">
            <img src="https://res.cloudinary.com/dg8z8uh8f/image/upload/v1686923602/xjy00jf8gzzdcow9offn.png" width="120" /> &nbsp;
            <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong><span id="invoiceId">ID: #{{$order['ticketOrderRef']}}</span></strong></p>
        </div>
        <div id="invoice-title" style="text-align: center">Invoice</div>

        <table class="receipt-owner">
            <thead>
                <tr>
                    <td width="500" style="width:300px !important;">
                            <ul class="">
                                <li class="text-muted">From: <span style="color:#5d9fc5 ;">ATOP Projects Ltd</span></li>
                                <li class="text-muted">2, Church Street, off Asajon Street,<br>
                                    Sangotedo</li>
                                <li class="text-muted">Lagos, Nigeria</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> (+234) 0806 229 1780 </li>
                            </ul>
                        </td>
                    <td width="300" style="width:300px !important;">
                            <ul class="">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$order['userDetails']['full_name']}}</span></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold invoiceId">Invoice ID: #{{$order['ticketOrderRef']}}</span></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold" id="invoiceDate"></span>{{$order['invoiceDate']}}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                    <span
                                        class="me-1 fw-bold">Status:</span>
                                    <span class="badge bg-warning text-black fw-bold" style="color: orangered">
                                        {{$order["isPaymentConfirmedStatus"]=="Confirmed" ?"Paid" : "Unpaid"}}
                                    </span>
                                </li>
                            </ul>
                        </td>
                </tr>
            </thead>
        </table>

        <div class="invoice-details">
            <table class="table table-striped table-borderless invoice-orders" cellspacing="0" >
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
        <div class="total-amount-caption">
            <p class="text-black"><span class="text-black me-3">
                                            Total Amount</span>
                <span style="font-size: 25px;" class="totalCharges">{!!$order['totalCharges']!!}</span></p>
        </div>
        <div class="">
            <p>Our Whatsapp numbers</p>
            <span class="text-info" style="color:#5d9fc5 ;">(+234) 0806 293 7553 / (+234) 703 368 8363 </span>
        </div>
    </div>
</div>
