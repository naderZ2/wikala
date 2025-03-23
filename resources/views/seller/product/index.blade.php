@extends('seller.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.Products') </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard') </li>
<li class="breadcrumb-item active">@lang('lang.Products')</li>
@endsection

@section('content')
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.quantity')</th>
									<th>@lang('lang.price')</th>
									<th>price before discount</th>
									<th>@lang('lang.Main_Image')</th>
									<th>@lang('lang.Category')</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($products as $product)
									<tr>
										<td>{{ $product->name }}</td>
										<td>{{ $product->quantity }}</td>
										<td>{{ $product->price }}</td>
										<td>{{ $product->old_price }}</td>
										<td >
											<img src="{{ asset($product->main_image) }}"  alt=""  class="image-fluid"  height="90" width="90">
										</td>
										<td>{{ $product->category->name }}</td>
										<td class="text-end">
											<button class="btn btn-primary" id="addRow" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRow({{ $product }})">@lang('lang.details')</button>
											<a class="btn btn-primary" href="{{ route('seller.product.edit',$product->id) }}" >@lang('lang.edit')</a>
											{{-- <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Delete</button> --}}
										</td>
							
									</tr>
									@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.quantity')</th>
									<th>@lang('lang.price')</th>
									<th>price before discount</th>
									<th>@lang('lang.Main_Image')</th>
									<th>@lang('lang.Category')</th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.details')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 mb-3">
						<div class="col">
							<div class="mb-3 mb-0">
								<label for="exampleFormControlTextarea4">@lang('lang.description')</label>
								<textarea class="form-control" id="description" name="description" rows="3" readonly></textarea>
							</div>
						</div>
					</div>

					<div class="card">
					
						<label for="exampleFormControlTextarea4">@lang('lang.images')</label>
						<div class="card-body">
							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" id="mazen">
								  <div class="carousel-item active">
									{{-- <img class="d-block w-100" src="{{asset('assets/images/slider/4.jpg')}}" alt="First slide"> --}}
								  </div>
								  {{-- <div class="carousel-item">
									<img class="d-block w-100" src="{{asset('assets/images/slider/4.jpg')}}" alt="Second slide">
								  </div> --}}
								  {{-- <div class="carousel-item">
									<img class="d-block w-100" src="{{asset('assets/images/slider/4.jpg')}}" alt="Third slide">
								  </div> --}}
								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								  <span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								  <span class="carousel-control-next-icon" aria-hidden="true"></span>
								  <span class="sr-only">Next</span>
								</a>
							  </div>
							
						</div>
					</div>
				</div>
				
				{{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal">@lang('lang.close')</button>
					{{-- <button class="btn btn-secondary" type="submit">Save changes</button> --}}
				</div>
			

			</div>
		  
	   </div>
	</div>
</div>

@endsection

<script>
	function getRow(data){

		if(data){
			document.getElementById("description").value=data['description'];

			data['images'].forEach((img,index) => {
				var temp=img['name'];
				var active='';
				document.getElementById("mazen").innerHTML += `
				<div class="carousel-item `+active+`">
					<img class="d-block w-100" src="{{asset('`+temp+`')}}" 
					alt="">
				</div>`;
				
			});
		}
   }

  
</script>
@section('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl-custom.js')}}"></script>
<script>
	 	$('#carouselExampleControls').carousel({
  		interval: 3000
	})
</script>

@endsection

