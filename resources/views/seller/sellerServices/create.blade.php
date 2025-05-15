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
<h3>@lang('lang.add_service')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.Products')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('seller.sellerServices.store') }}">
                        @csrf
						<div class="row">
							<div class="col-md-6 mb-3">
                                <label for="categorySelect">@lang('lang.Category')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="categorySelect" name="category_id">
                                    <option value="">@lang('lang.Select Category')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ app()->getLocale() == "en" ? $category->name_en : $category->name_ar }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please provide a valid category.</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="productSelect">@lang('lang.Products')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="productSelect" name="product_id">
                                    <option value="">@lang('lang.Select Product')</option>
                                </select>
                                <div class="invalid-feedback">Please provide a valid product.</div>
                            </div>
                            
                              <div class="col-md-6 mb-3">
                                <label for="dateInput">@lang('lang.date')</label>
                                <input type="date" class="form-control" id="dateInput" name="date" required>
                                <div class="invalid-feedback">Please provide a valid date.</div>
                            </div>
						</div>
						<button class="btn btn-primary" type="submit">@lang('lang.save')</button>
					</form>
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

<script>
    // Event listener for category selection
    $('#categorySelect').on('change', function() {
        var categoryId = $(this).val();
        if (categoryId) {
            // Call the AJAX function to fetch products for the selected category
            fetchProductsByCategory(categoryId);
        } else {
            // If no category is selected, clear the product dropdown
            $('#productSelect').html('<option value="">@lang("lang.Select Product")</option>');
        }
    });

    // Function to fetch products based on selected category using AJAX
    function fetchProductsByCategory(categoryId) {
        $.ajax({
            url: "{{ route('seller.productServices.get.products.by.category') }}", // Your route to fetch products by category
            type: 'GET',
            data: { category_id: categoryId },
            success: function(response) {
                var productSelect = $('#productSelect');
                productSelect.html('<option value="">@lang("lang.Select Product")</option>'); // Reset products dropdown
                if (response.products.length > 0) {
                    // Populate the products dropdown with options
                    $.each(response.products, function(index, product) {
                        productSelect.append('<option value="' + product.id + '">' + 
                            (document.documentElement.dir == 'rtl' ? product.name_ar : product.name_en) + 
                        '</option>');
                    });
                } else {
                    // If no products found, show a message
                    productSelect.append('<option value="">@lang("lang.No products available for this category")</option>');
                }
            },
            error: function() {
                alert('@lang("lang.Error loading products.")');
            }
        });
    }
</script>
@endsection
