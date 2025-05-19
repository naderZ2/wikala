@extends('admin.layout.master')
@section('title', 'Bootstrap Basic Tables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.order_details')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Orders')</li>
<li class="breadcrumb-item active">@lang('lang.order_details')</li>
@endsection

@section('content')
<div class="container-fluid">
	@if ($order->bill_url == null)
	<button class="btn btn-primary" type="button">
		<a href="{{route('order.generate_nvoice',$order->id)}}" style="color:white"  >@lang('lang.save_invoice')</a>
	</button>
	@else
	<button class="btn btn-primary" type="button">
		<a href="{{ asset($order->bill_url)}}"  target="_blank" style="color:white" >@lang('lang.Show_Invoice')</a>
		{{-- <a href="{{route('order.show_invoice',$order->id)}}" style="color:white" >@lang('lang.Show_Invoice')</a> --}}
	</button>
	@endif
	
		
		
	
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				{{-- <div class="card-header">
					<h5>Basic Table</h5>
					<span>Use a class<code>table</code> to any table.</span>
				</div> --}}
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">@lang('lang.Name')</th>
								<th class="text-center">@lang('lang.quantity')</th>
                                <th class="text-center">@lang('lang.price')</th>

							</tr>
						</thead>
						<tbody>
                            @foreach (collect($order)['order_details'] as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $item['product']['name'] }}</td>
                                    <td class="text-center">{{ $item['quantity'] }}</td>
                                    <td class="text-center">{{ $item['price'] }}</td>
                                </tr> 
                            @endforeach
							
						
						</tbody>
                        <tfoot>
							<tr>
								<tr>
									<td>@lang('lang.Total_Product_Price')</td>
									<td>{{ $order['total_price'] }}</td>
								</tr>
								<td>@lang('lang.delivery_fee')</ف>
									<td>{{ $order['delivery_fee'] }}</td>
								</tr>
								
									<tr>
										<td>@lang('lang.Total_Price')</td>
										<td>{{ $order['total_price'] + $order['delivery_fee'] }}</td>
									</tr>
                        </tfoot>
					</table>
			


				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
@endsection