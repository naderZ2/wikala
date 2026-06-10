<html lang="ar" dir="{{ (App::getLocale() == 'en') ? 'ltr' : 'rtl' }}">


<head>
    <title>@lang('lang.invoice') # {{ $order->order_number }}</title>
    <style>
        body {
            /* Use a modern Arabic font */
            /* font-family: 'Cairo', sans-serif;  */
            font-family: 'amiri', sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            /* height: 100vh; Center vertically */
            min-height: 100vh;

        }
        .invoice-container {
            width: 100%; /* Adjust width as needed */
            max-width: 700px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-around;
            align-items: flex-start; 
            margin-bottom: 50px
            /* direction: {{ (App::getLocale() == 'en') ? 'ltr' : 'rtl' }}; */
        }
        .section {
            width: 80%; /* Ensure both sections fit side by side */
        }
        .section-title {
            font-size: 18px;
            color: #4a4aee;
            margin-bottom: 10px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .info-item {
            margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.6;
            /* text-align: {{ (App::getLocale() == 'en') ? 'left' : 'right' }}; */
        }
        .info-item span {
            font-weight: bold;
            color: #333;
        }


        .total_price{
            margin-top: 50px;

        }


        table {
  border-collapse: collapse; /* Collapsing borders */
  width: 100%;
}

/* Applying styles to table headers */
th {
  background-color: #f2f2f2; /* Setting background color */
  border: 1px solid #dddddd; /* Adding border */
  text-align: center; /* Aligning text to the left */
  padding: 8px; /* Adding padding */
}

/* Applying styles to table rows */
tr {
    border: 1px solid #dddddd; /* Adding border */
    text-align: center; /* Aligning text to the left */
}

/* Applying styles to table cells */
td {
    padding: 8px; /* Adding padding */
    text-align: center; /* Aligning text to the left */
}

/* Applying different background color to even rows */
tr:nth-child(even) {
  background-color: #f2f2f2;
}



    </style>
</head>
<body>
    <h1>@lang('lang.invoice') # {{ $order->order_number }}</h1>
    {{-- <p>@lang('lang.created_at') : {{ $order->created_at }}</p>
    <p>@lang('lang.Client'): {{ $order->user->name  }}</p> --}}



    <div class="invoice-container">
        <!-- Client Section -->
        <div class="section" >
            <h2 class="section-title">@lang('lang.Client')</h2>
            <p class="info-item"><span>@lang('lang.Name') :</span> {{ $order->user->name }}</p>
            <p class="info-item"><span>@lang('lang.phone') :</span> {{ $order->user?->phone }}</p>
            <p class="info-item"><span>@lang('lang.Email'):</span> {{ $order->user?->email }}</p>
            <p class="info-item"><span>@lang('lang.region') :</span> {{ (App::getLocale() == 'en') ? $order->address?->region?->name_en : $order->address?->region?->name_ar }}</p>
            <p class="info-item"><span>@lang('lang.address'):</span> {{$order->address?->block_no . ' - '. $order->address?->street . ' - '. $order->address?->building_no . ' - '. $order->address?->floor_no . ' - '. $order->address?->flat_no . ' - '. $order->address?->notes}}</p>
            <p class="info-item"><span>@lang('lang.created_at'):</span> {{ $order?->created_at->format('Y-m-d') }}</p>
        </div>
            
        <div class="section" >
            <h2 class="section-title" >@lang('lang.Seller')</h2>
            <p class="info-item"><span>@lang('lang.Name') :</span> {{ $order->seller?->name }}</p>
            <p class="info-item"><span>@lang('lang.Email'):</span> {{ $order->seller?->email }}</p>
        </div>

    </div>




    <table>
        <thead>
            <tr>
                <th>@lang('lang.Product')</th>
                <th>@lang('lang.price')</th>
                <th>@lang('lang.quantity')</th>
                <th>@lang('lang.Total_Price')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $order->orderDetails as $item)
                <tr>
                    <td>{{ (App::getLocale() == 'en') ? $item->product?->name_en  :  $item->product?->name_ar }}</td>
                    <td>{{  $item->product?->price }}</td>
                    <td>{{  $item->product->quantity ?? 1 }}</td>
                    <td>{{  $item?->price  }}</td>
                    {{-- <td>${{ number_format($item['price'], 2) }}</td> --}}
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>@lang('lang.Product')</th>
                <th>@lang('lang.price')</th>
                <th>@lang('lang.quantity')</th>
                <th>@lang('lang.Total_Price')</th>  
        </tfoot>
    </table>



    <h4 class="total_price" >@lang('lang.Total_Product_Price') {{$order?->total_price}} </h4>
    <h4 class="delivery_fee" >@lang('lang.delivery_fee') {{$order?->delivery_fee}} </h4>
    <h4 class="total_price" >@lang('lang.Total_Price') {{$order?->total_price +$order?->delivery_fee}} </h4>



</body>
</html>
