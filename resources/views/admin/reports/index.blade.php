@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')

@endsection






@section('breadcrumb-title')
<h3> @lang('lang.reports')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.reports')</li>
@endsection








@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="advance-1">
                            <thead>
                                <tr>
                                    <th>@lang('lang.number')</th>
                                    <th class="text-center">@lang('lang.Reporter')</th>
                                    <th class="text-center">@lang('lang.Report_Option')</th>
                                    <th class="text-center">@lang('lang.Additional_Notes')</th>
                                    <th class="text-center">@lang('lang.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $isEn = app()->getLocale() === 'en'; @endphp
                                @forelse ($reports as $report)
                                    @php
                                        $optionTitle = $report?->reportOption
                                            ? ($isEn
                                                ? ($report->reportOption->title_en ?? $report->reportOption->title_ar)
                                                : ($report->reportOption->title_ar ?? $report->reportOption->title_en))
                                            : trans('lang.no_data');
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $report?->reporter?->name ?? trans('lang.no_data') }}</td>
                                        <td class="text-center">{{ $optionTitle }}</td>
                                        <td class="text-center">{{ $report?->additional_notes ?? trans('lang.no_data') }}</td>
                                        <td class="text-center">
                                            @can('view report')
                                                <a href="{{ route('admin.reports.details', $report->id) }}" class="btn btn-info m-1">@lang('lang.details')</a>
                                            @endcan
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
                                    <th class="text-center">@lang('lang.Reporter')</th>
                                    <th class="text-center">@lang('lang.Report_Option')</th>
                                    <th class="text-center">@lang('lang.Additional_Notes')</th>
                                    <th class="text-center">@lang('lang.actions')</th>
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