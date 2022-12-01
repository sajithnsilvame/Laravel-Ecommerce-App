<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .cpy_ {
            margin-top: 400px;
            margin-left: 30%;
        }

        
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Order ID: {{$order_Details->id}}<br />
                                Created: {{$order_Details->created_at}}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Sriyani TexTile<br />
                                No.25 Padaviya<br />
                                contact@sriyanitext.com<br />
                                025-2255-616
                            </td>

                            <td>
                                {{$order_Details->name}}<br />
                                {{$order_Details->address}}<br />
                                {{$order_Details->email}}<br />
                                {{$order_Details->phone}}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>



    </div>

    <table class="mt-4" width="100%">
        <th scope="col" class="table-primary mb-1">Payment Status</th>
        <tr>
            <td>{{$order_Details->payment_status}}</td>
        </tr>
    </table>

    <table class="mt-4" width="100%">

        <th scope="col" class="table-primary mb-1">Delivery Status</th>
        <tr>
            <td>{{$order_Details->delivery_status}}</td>
        </tr>
    </table>

    <table class="mt-4" width="100%">
        <thead>
            <tr>

                <th scope="col" class="table-primary">Item</th>
                <th scope="col" class="table-primary">Quantity</th>
                <th scope="col" class="table-primary">Price</th>


            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{$order_Details->product_title}}</td>
                <td>{{$order_Details->quantity}}</td>
                <td>Rs {{$order_Details->price}}</td>
            </tr>


            <tr class="table-primary">
                <td colspan="2">Total Amount</td>
                <td>Rs {{$order_Details->price}}</td>
            </tr>

        </tbody>
    </table>

    <div class="cpy_">
        <p>© 2021 All Rights Reserved By Sriyani Textile</p>
    </div>
</body>

</html>