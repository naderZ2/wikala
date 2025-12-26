@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')

@endsection

@section('breadcrumb-title')



<h3>
    @switch(request('status'))
        @case('accepted') @lang('lang.accepted_ads') @break
        @case('under_review') @lang('lang.under_review_ads') @break
        @case('rejected') @lang('lang.rejected_ads') @break
        @case('outdated') @lang('lang.outdated_ads') @break
        @default @lang('lang.ads')
    @endswitch
</h3>





@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">
    @switch(request('status'))
        @case('accepted') @lang('lang.accepted_ads') @break
        @case('under_review') @lang('lang.under_review_ads') @break
        @case('rejected') @lang('lang.rejected_ads') @break
        @case('outdated') @lang('lang.outdated_ads') @break
        @default @lang('lang.ads')
    @endswitch
</li>

@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12">
			{{-- @can('add category') --}}
				<a href="{{route('ads.create')}}"  class="btn btn-primary">@lang('lang.add_ad')</a>
			{{-- @endcan	 --}}
		</div>
		<div class="col-sm-12">
			<div class="card">
				
				<div class="card-body">
					<div class="table-responsive">
						{{-- <div class="col-sm-4 mb-2">
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
						</div> --}}

						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.number')</th>
									<th class="text-center">@lang('lang.Title')</th>
									<th class="text-center">@lang('lang.phone')</th>
									<th class="text-center">@lang('lang.Start_Date')</th>
									<th class="text-center">@lang('lang.End_Date')</th>
									
									<th></th>								
								</tr>
							</thead>
							

							<tbody>
								@forelse ($ads as $ad)
									<tr>
										<td>{{ $ad->ad_number }}</td>
										<td class="text-center">{{ $ad->title }}</td>
										<td class="text-center">{{ $ad?->user?->phone }}</td>
										<td class="text-center">{{ $ad->start_date }}</td>
										<td class="text-center">{{ $ad->end_date }}</td>
										<td class="text-center">
											<a href="{{ route('ads.details', $ad->id) }}" class="btn btn-info m-1">@lang('lang.details')</a>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="5" class="text-center text-muted">@lang('lang.no_data')</td>
									</tr>
								@endforelse
							</tbody>
							

							<tfoot>
								<tr>
									<th>@lang('lang.number')</th>
									<th class="text-center">@lang('lang.Title')</th>
									<th class="text-center">@lang('lang.phone')</th>
									<th class="text-center">@lang('lang.Start_Date')</th>
									<th class="text-center">@lang('lang.End_Date')</th>
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