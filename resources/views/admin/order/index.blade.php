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
										<td class="text-center">{{ trans('lang.' . $order->status) }}</td>

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
											<button class="btn btn-warning m-1" type="button" data-bs-toggle="modal" data-bs-target="#setStatusModal" onclick="setStatusFor({{ $order->id }}, '{{ $order->status }}')">@lang('lang.Status')</button>
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

<div class="modal fade" id="setStatusModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">@lang('lang.change_status')</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="{{ route('order.set_status') }}">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="id" id="setStatusOrderId">
					<div class="mb-3">
						<label for="setStatusSelect">@lang('lang.Status')</label>
						<select class="form-control" id="setStatusSelect" name="status" required>
							<option value="order_placed">@lang('lang.order_placed')</option>
							<option value="confirmed">@lang('lang.confirmed')</option>
							<option value="shipped">@lang('lang.shipped')</option>
							<option value="out_for_delivery">@lang('lang.out_for_delivery')</option>
							<option value="delivered">@lang('lang.delivered')</option>
							<option value="cancel">@lang('lang.cancel')</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">@lang('lang.close')</button>
					<button class="btn btn-primary" type="submit">@lang('lang.save')</button>
				</div>
			</form>
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

function setStatusFor(id, currentStatus) {
    document.getElementById('setStatusOrderId').value = id;
    const select = document.getElementById('setStatusSelect');
    if (currentStatus) {
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].value === currentStatus) {
                select.selectedIndex = i;
                break;
            }
        }
    }
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