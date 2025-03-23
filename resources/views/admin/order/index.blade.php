@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')


@if(Route::currentRouteName() == 'order.under_preparation')

<h3> @lang('lang.Under_Preparation_Orders') </h3>

@elseif(Route::currentRouteName() == 'order.completed')

<h3> @lang('lang.Completed_Orders') </h3>

@elseif(Route::currentRouteName() == 'order.new')

<h3> @lang('lang.New_Orders') </h3>

@else

<h3> @lang('lang.All_Orders') </h3>

@endif


@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">
	@lang('lang.Orders')


</li>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">

					<div class="table-responsive">
						<div class="col-sm-4 mb-2">
							<input 
								type="number" 
								id="searchPhone" 
								placeholder="Search by phone" 
								class="form-control" 
								oninput="filterTableByPhone()"
							>
						</div>
						
						<div class="col-sm-4 mb-2">
							<input 
								type="number" 
								id="searchOrderNumber" 
								placeholder="Search by order number" 
								class="form-control" 
								oninput="filterTableByOrderNumber()"
							>
						</div>

						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Order_Number')</th>
									<th class="text-center">@lang('lang.Total_Price')</th>
									<th class="text-center">@lang('lang.Status')</th>
									<th>@lang('lang.Client')</th>
									<th>@lang('lang.delivery_fee')</th>
									<th class="text-center">@lang('lang.Time')</th>
									<th class="text-center">@lang('lang.delivery_time')</th>

									<th></th>								
								</tr>
							</thead>
							<tbody id="userTable">
								@forelse ($orders as $order)
									<tr>
										<td id="orderNumber">{{ $order->order_number }}</td>
										<td class="text-center">{{ $order->total_price}}</td>
										<td class="text-center">{{ $order->status}}</td>

										{{-- <td class="text-center">{{ $order->user?->phone}}</td> --}}

										<td data-phone="{{ $order?->user?->phone }}" >
											{{-- @dd() --}}
											{{ $order?->user?->name	}}
											
										</td>
										<td>
											{{-- @dd() --}}
											{{ $order?->delivery_fee	}}
											
										</td>
										<td class="text-center">{{ $order->created_at->format('Y-m-d - H:i') }}</td>
										<td class="text-center">{{ $order?->delivery_time?->format('Y-m-d - H:i') }}</td>
										<td>
											
											<a href="{{ route('order.details',$order->id) }}" class="btn btn-info m-1" >@lang('lang.details')</a>
											{{-- @can('edit order status') --}}
											@if ( $order->status !=='delivered' && $order->status !=='cancel')
												
											<a href="{{ route('order.change_status',[$order->id,'normal']) }}" class="btn btn-primary m-1" >@lang('lang.change_status')</a>
											{{-- @endcan	 --}}
											{{-- @can('cancel orders') --}}
											<a href="{{ route('order.change_status',[$order->id,'cancel']) }}" class="btn btn-danger m-1" >@lang('lang.cancel')</a>
											{{-- @endcan	 --}}
											@endif
											<!--@if($order->file)-->
    							<!--				<a href="{{asset($order->file)}}" download rel="noopener noreferrer" target="_blank" class="btn btn-success">-->
           <!--                                        @lang('lang.downloadFile')-->
           <!--                                     </a>-->
           <!--                                 @endif-->
										</td>
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Order_Number')</th>
									<th class="text-center">@lang('lang.Total_Price')</th>
									<th class="text-center">@lang('lang.Status')</th>
									<th>@lang('lang.Client')</th>
									<th>@lang('lang.delivery_fee')</th>
									<th class="text-center">@lang('lang.Time')</th>
									<th class="text-center">@lang('lang.delivery_time')</th>
									<th></th>								
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
	
@section('script')




<script>


    function filterTableByPhone() {
    const input = document.getElementById("searchPhone").value; // Input value
    const rows = document.querySelectorAll("#userTable tr"); // All table rows

    rows.forEach(row => {
        // Find the <td> containing the 'data-phone' attribute (the second <td>)
        const phoneCell = row.querySelector("td[data-phone]"); // Get the 'data-phone' td

        if (phoneCell) {
            const phone = phoneCell.getAttribute("data-phone"); // Get the data-phone value
			console.log(phone);
			

            if (input === "" || (phone && phone.includes(input))) {
                row.style.display = ""; // Show row if input is empty or matches
            } else {
                row.style.display = "none"; // Hide row if no match
            }
        } else {
            row.style.display = "none"; // Hide row if no phone data
        }
    });
}

function filterTableByOrderNumber() {
    const input = document.getElementById("searchOrderNumber").value.trim(); // Input value
    const rows = document.querySelectorAll("#userTable tr"); // All table rows

    rows.forEach(row => {
        // Find the <td> containing the order number (the first <td>)
        const orderNumberCell = row.querySelector("td#orderNumber"); // Use querySelector to get the <td>
        
        if (orderNumberCell) {
            const number = orderNumberCell.textContent.trim(); // Extract the text content of the <td>
            
            // Check if input is empty or matches the order number
            if (input === "" || (number && number.includes(input))) {
                row.style.display = ""; // Show row if input is empty or matches
            } else {
                row.style.display = "none"; // Hide row if no match
            }
        } else {
            row.style.display = "none"; // Hide row if no order number found
        }
    });
}


</script>


<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection