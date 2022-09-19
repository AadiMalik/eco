<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Rangmahal</title>
    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>
</head>

<body style="padding: 30px;">
    <div class="container">
        
        @foreach ($master as $item)
        <div class="row">
            <div class="col-lg-12" style="text-align:center;">
                <table style="width:100%;">
                    <tr>
                        <td>
                            <b>Order No: {{$item->invoice}}</b>
                        </td>
                        <td>
                            <b>Order Date/Time: {{$item->created_at}}</b>
                        </td>
                        <td>
                            <b>Order Place: <span id="date"></span></b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <h1 style=" font-size:50px; font-weight:bold;">Eco</h1>
                
        <hr>
            </div>
            <div class="col-6">
                
                <div class="card">
                    <div class="card-body">
                <h5>Shipping To</h5>
                <hr>
                <table style="width:100%;">
                    <tbody>
                        @foreach ($address->where('user_id',$item->user_id) as $item1)
                        @if($item->address == '1')
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{$item1->user_name->fname??''}} {{$item1->user_name->lname??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td>{{$item1->user_name->email??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Phone No:</b></td>
                            <td>{{$item1->user_name->phone??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Country:</b></td>
                            <td>{{$item1->country_name->name??''}}</td>
                        </tr>
                        <tr>
                            <td><b>State:</b></td>
                            <td>{{$item1->state_name->name??''}}</td>
                        </tr>
                        <tr>
                            <td><b>City:</b></td>
                            <td>{{$item1->city_name->name??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Zipcode:</b></td>
                            <td>{{$item1->zipcode??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td>{{$item1->address??''}}</td>
                        </tr>
                        @elseif($item->address == '2')
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{$item1->user_name->fname??''}} {{$item1->user_name->lname??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td>{{$item1->user_name->email??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Phone No:</b></td>
                            <td>{{$item1->user_name->phone??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Country:</b></td>
                            <td>{{$item1->country_name->name??''}}</td>
                        </tr>
                        <tr>
                            <td><b>State:</b></td>
                            <td>{{$item1->state_name->name??''}}</td>
                        </tr>
                        <tr>
                            <td><b>City:</b></td>
                            <td>{{$item1->city_name->name??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Zipcode:</b></td>
                            <td>{{$item1->zipcode??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td>{{$item1->shipping??''}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @foreach ($other->where('user_id',$item->user_id) as $item2)
                        @if($item->address=='3')
                        <tr>
                            <td><b>Full Name:</b></td>
                            <td><span>{{$item2->fname??''}} {{$item2->lname??''}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td><span>{{$item2->email??''}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Phone:</b></td>
                            <td><span>{{$item2->phone??''}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Country:</b></td>
                            <td><span>{{$item2->country_name->name??''}}</span></td>
                        </tr>
                        <tr>
                            <td><b>State:</b></td>
                            <td><span>{{$item2->state_name->name??''}}</span></td>
                        </tr>
                        <tr>
                            <td><b>City:</b></td>
                            <td><span>{{$item2->city_name->name??''}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Zipcode:</b></td>
                            <td><span>{{$item2->zipcode??''}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td><span>{{$item2->address??''}}</span></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            <div class="col-6">
            <div class="card">
                    <div class="card-body">
                <h5>Billing Detail</h5>
                <hr>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td><b>Invoice No:</b></td>
                            <td>{{$item->invoice??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Quantity:</b></td>
                            <td>{{$item->qty??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Sub Total:</b></td>
                            <td>{{$item->sub_total??''}}</td>
                        </tr>
                        <tr>
                            <td><b>Discount:</b></td>
                            <td>{{$item->discount??''}}</td>
                        </tr>
                        <tr style="border-top:1px solid rgba(0,0,0,.1);">
                            <td><b>Total:</b></td>
                            <td><b>{{$item->total??''}}</b> </td>
                        </tr>
                    </tbody>
                </table>
                
                </div>
                </div>
            </div>
        </div>
        @endforeach
<hr>
        <div class="alert alert-danger">
            <strong>Return Policy!</strong> Indicates a dangerous or potentially negative action.
        </div>
        <hr>
        <button onclick="window.print()" class="btn btn-danger" id="printPageButton"><span class="fa fa-print"></span>Print</button>
    </div>
    <script type="text/javascript">
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>