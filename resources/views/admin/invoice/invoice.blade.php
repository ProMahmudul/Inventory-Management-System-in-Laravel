<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    {{--<link href="{{asset('admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}

    <style>
        .card{
            border: 1px solid #dddddd;
            padding: 30px;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .heder-left h3{
            font-size: 25px;
        }

        .invoice-footer{
            display: flex;
            justify-content: space-between;
        }
        .invoice-title h2 {
            border: 1px solid #333;
            padding: 10px 25px;
            font-size: 30px;
            background: #f8f9fa;
        }
        .container {
            max-width: 960px;
            margin: auto;
        }
        table, td, th {
            border: 1px solid #272727;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 40px;
            margin-bottom: 130px;
        }

        th {
            height: 40px;
            background: #D9D9D9;
        }
        
        tr{
            text-align: center;
            height: 30px;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body p-0">
                    <div class="row p-5 invoice-header">
                        <div class="col-md-4 heder-left">
                            <h3 class="font-weight-bold mb-4">Company Name</h3>
                            <p class="mb-1">John Doe, Mrs Emma Downson</p>
                            <p>Acme Inc</p>
                            <p class="mb-1">Berlin, Germany</p>
                            <p class="mb-1">6781 45P</p>
                        </div>

                        <div class="col-md-4 invoice-title">
                            <h2 class="mt-5 border border-dark p-2 text-center bg-light">Stock In Invoice</h2>
                        </div>

                        <div class="col-md-4 text-right">
                            <p class="font-weight-bold mb-1">Invoice #{{ $data->id }}</p>
                            <p class="text-muted">Invoice Date: {{ $data->created_at }}</p>
                        </div>
                    </div>

                    <hr class="my-2">


                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table border" style="width:100%">
                                <thead class="border">
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Supplier Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Lot Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Rent Per Ton</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Weight</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Rent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $data->supname }}</td>
                                    <td>{{ $data->lotname }}</td>
                                    <td>{{ $data->rent }} tk</td>
                                    <td>{{ $data->tweight }} ton</td>
                                    <td>{{ $data->totalrent }} tk</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex p-4 invoice-footer">
                        <div class="py-3 px-5 text-center" style="text-align: center">
                            <div class="mb-2">..........................................</div>
                            <div class="mb-2">Authorized Signature</div>
                        </div>

                        <div class="py-3 px-5 text-center ml-auto" style="text-align: center">
                            <div class="mb-2">..........................................</div>
                            <div class="mb-2">Supplier Signature</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
</div>


</body>
</html>
