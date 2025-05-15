@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.add_service')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Products')</li>
<li class="breadcrumb-item active">@lang('lang.add_Product')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('admin.sellerServices.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="sellerSelect">@lang('lang.Sellers')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="sellerSelect" name="seller_id">
                                    <option value="">@lang('lang.Select Seller')</option>
                                    @foreach ($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please provide a valid seller.</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="categorySelect">@lang('lang.Category')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="categorySelect" name="category_id">
                                    <option value="">@lang('lang.Select Category')</option>
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
                    </div>
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
    $(document).ready(function() {
        // Event listener for seller selection
        $('#sellerSelect').on('change', function () {
            const sellerId = $(this).val();
            if (sellerId) {
                fetchCategoriesBySeller(sellerId);
                $('#productSelect').html('<option value="">@lang("lang.Select Product")</option>'); // Reset product dropdown
            } else {
                $('#categorySelect').html('<option value="">@lang("lang.Select Category")</option>');
                $('#productSelect').html('<option value="">@lang("lang.Select Product")</option>');
            }
        });

        // Event listener for category selection
        $('#categorySelect').on('change', function () {
            const categoryId = $(this).val();
            if (categoryId) {
                fetchProductsByCategory(categoryId);
            } else {
                $('#productSelect').html('<option value="">@lang("lang.Select Product")</option>');
            }
        });

        // Fetch categories by seller
        function fetchCategoriesBySeller(sellerId) {
            $.ajax({
                url: "{{ route('admin.sellerServices.get.categories.by.seller') }}",
                type: 'GET',
                data: { seller_id: sellerId },
                success: function (response) {
                    const categorySelect = $('#categorySelect');
                    categorySelect.html('<option value="">@lang("lang.Select Category")</option>');
                    if (response.categories && response.categories.length > 0) {
                        response.categories.forEach(category => {
                            categorySelect.append(`<option value="${category.id}">${document.documentElement.dir === 'rtl' ? category.name_ar : category.name_en}</option>`);
                        });
                    } else {
                        categorySelect.append('<option value="">@lang("lang.No categories available for this seller")</option>');
                    }
                },
                error: function () {
                    alert('@lang("lang.Error loading categories.")');
                }
            });
        }

        // Fetch products by category
        function fetchProductsByCategory(categoryId) {
            $.ajax({
                url: "{{ route('admin.productServices.get.products.by.category') }}",
                type: 'GET',
                data: { category_id: categoryId },
                success: function (response) {
                    const productSelect = $('#productSelect');
                    productSelect.html('<option value="">@lang("lang.Select Product")</option>');
                    if (response.products && response.products.length > 0) {
                        response.products.forEach(product => {
                            productSelect.append(`<option value="${product.id}">${document.documentElement.dir === 'rtl' ? product.name_ar : product.name_en}</option>`);
                        });
                    } else {
                        productSelect.append('<option value="">@lang("lang.No products available for this category")</option>');
                    }
                },
                error: function () {
                    alert('@lang("lang.Error loading products.")');
                }
            });
        }
    });
</script>
@endsection
