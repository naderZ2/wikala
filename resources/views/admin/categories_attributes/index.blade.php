@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.category_attributes') </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.category_attributes')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12">
			@can('add category')
				<a href="{{route('category-attributes.create')}}"  class="btn btn-primary">@lang('lang.add_category_attribute')</a>
			@endcan	
		</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Category')</th>
									<th>@lang('lang.Attributes')</th>
									<th>@lang('lang.mandatory')</th>
									
									<th></th>									
								</tr>
							</thead>
							<tbody>
								@forelse ($categoryAttributes as $value)
									<tr>
										<td>{{ $value?->category?->name }}</td>

										<td>{{ $value?->attribute?->name }}</td>
										
										<td>{{ $value?->mandatory == 1 ? __('lang.required') : __('lang.not_required') }}</td>
										
										{{-- <td>{{
											__('lang.'.$attribute->type)
										}}</td> --}}
										{{-- <td>{{ $attribute?->price }}</td> --}}
										
										<td>
											{{-- <button class="btn btn-primary" id="addRow" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRow({{ $product }})">@lang('lang.details')</button> --}}
											{{-- @can('change product status') --}}
											<a class="btn btn-primary mt-1" href="{{ route('category-attributes.edit',$value->id) }}" >@lang('lang.edit')</a>
											@if ($value?->enable == 1)
											<a class="btn btn-danger mt-1"  href="{{ route('category-attributes.enable', $value->id) }}" >@lang('lang.Disable') </a>
											@else
												<a class="btn btn-success mt-1"  href="{{ route('category-attributes.enable', $value->id) }}" >@lang('lang.Enable')</a>
											@endif
											
											<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteAction('{{ route('category-attributes.destroy', $value->id) }}')">@lang('lang.Delete')</button>
										</td>							

											
											

									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Category')</th>
									<th>@lang('lang.Attributes')</th>
									<th>@lang('lang.mandatory')</th>
									
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


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">@lang('lang.Delete') @lang('lang.category_attributes')</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>@lang('lang.are_you_sure_to_delete')</p>
            </div>
            <div class="modal-footer">
                <form id="delete-form" method="POST" action="" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.cancel')</button>
                    <button type="submit" class="btn btn-danger">@lang('lang.Delete')</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="enableDisableModal" tabindex="-1" role="dialog" aria-labelledby="enableDisableModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enableDisableModalLabel">@lang('lang.Enable_Disable') @lang('lang.attribute')</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>@lang('lang.are_you_sure_to_enable_disable')</p>
            </div>
            <div class="modal-footer">
                <form id="enable-disable-form" method="POST" action="" style="display: inline;">
                    @csrf
                    {{-- @method('PATCH') --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.cancel')</button>
                    <button type="submit" class="btn btn-warning" id="enable-disable-button">@lang('lang.Enable')</button>
                </form>
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
<script>
 function setDeleteAction(url) {
	 var form = document.getElementById('delete-form');
	 form.action = url;
 }

 <script>
    function setEnableDisableAction(url, id) {
        var form = document.getElementById('enable-disable-form');
        form.action = url;

        
        var button = document.getElementById('enable-disable-button');
        button.innerText = (button.innerText === '@lang('lang.Enable')') ? '@lang('lang.Disable')' : '@lang('lang.Enable')';
    }
</script>
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

