@extends('admin.layout.master')
@section('title', 'Products')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
@endsection

@section('style')
<style>
.variation-card {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 10px;
}
.variation-card .badge {
    font-size: 12px;
    padding: 4px 8px;
}
.variation-attr {
    display: inline-block;
    background: #e3e6f0;
    padding: 2px 8px;
    border-radius: 4px;
    margin-right: 5px;
    font-size: 12px;
}
.product-status-badge {
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 500;
}
.product-status-badge.approved { background: #d4edda; color: #155724; }
.product-status-badge.pending { background: #fff3cd; color: #856404; }
.product-status-badge.rejected { background: #f8d7da; color: #721c24; }
</style>
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.Products') </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.Products')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 mt-3">
            @can('add discount')
                <a href="{{route('product.create')}}" class="btn btn-primary mb-3">@lang('lang.add_Product')</a>
            @endcan
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="advance-1">
                            <thead>
                                <tr>
                                    <th>@lang('lang.Name')</th>
                                    <th>@lang('lang.quantity')</th>
                                    <th>@lang('lang.price')</th>
                                    <th>Old Price</th>
                                    <th>@lang('lang.Seller')</th>
                                    <th>@lang('lang.Main_Image')</th>
                                    <th>@lang('lang.Category')</th>
                                    <th>Variations</th>
                                    <th>@lang('lang.Status')</th>
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
                                        <td>{{ $product->seller->name ?? '-' }}</td>
                                        <td>
                                            <img src="{{ asset($product->main_image) }}" alt="" class="image-fluid" height="60" width="60" style="border-radius:8px;">
                                        </td>
                                        <td>{{ $product->category->name ?? '-' }}</td>
                                        <td>
                                            @if($product->variations && $product->variations->count() > 0)
                                                <span class="badge bg-info">{{ $product->variations->count() }} var(s)</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->is_available == 1)
                                                <span class="product-status-badge approved">@lang('lang.approved')</span>
                                            @elseif($product->is_available == 0)
                                                <span class="product-status-badge pending">@lang('lang.under_review')</span>
                                            @else
                                                <span class="product-status-badge rejected" title="{{ $product->rejection_reason }}">@lang('lang.rejected')</span>
                                                @if($product->rejection_reason)
                                                    <br><small class="text-danger mt-1" style="display:inline-block;">{{ Str::limit($product->rejection_reason, 30) }}</small>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">@lang('lang.details')</button>
                                            @can('change product status')
                                            <a class="btn btn-info btn-sm" href="{{ route('product.edit',$product->id) }}">@lang('lang.edit')</a>

                                            {{-- Approve button (show when not approved) --}}
                                            @if ($product->is_available != 1)
                                            <a href="{{ route('product.approve', $product->id) }}" class="btn btn-success btn-sm mt-1">
                                                @lang('lang.approve')
                                            </a>
                                            @endif

                                            {{-- Reject button (show when not already rejected) --}}
                                            @if ($product->is_available != -1)
                                            <button type="button" class="btn btn-danger btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $product->id }}">
                                                @lang('lang.reject')
                                            </button>
                                            @endif

                                            {{-- Disable button (show when approved) --}}
                                            @if ($product->is_available == 1)
                                            <a href="{{ route('product.update',$product->id) }}" class="btn btn-warning btn-sm mt-1">
                                                @lang('lang.Disable')
                                            </a>
                                            @endif
                                            @endcan
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
                                    <th>Old Price</th>
                                    <th>@lang('lang.Seller')</th>
                                    <th>@lang('lang.Main_Image')</th>
                                    <th>@lang('lang.Category')</th>
                                    <th>Variations</th>
                                    <th>@lang('lang.Status')</th>
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

{{-- Individual Detail Modals for each product --}}
@foreach ($products as $product)
<div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">{{ $product->name }} - @lang('lang.details')</h5>
             <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
                <div class="row">
                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <label><strong>Description</strong></label>
                        <p class="text-muted">{{ $product->description ?? 'No description' }}</p>
                    </div>

                    {{-- Rejection Reason (if rejected) --}}
                    @if($product->is_available == -1 && $product->rejection_reason)
                    <div class="col-md-12 mb-3">
                        <div class="alert alert-danger">
                            <strong><i class="fa fa-ban"></i> @lang('lang.rejection_reason'):</strong><br>
                            {{ $product->rejection_reason }}
                        </div>
                    </div>
                    @endif

                    {{-- Product Images --}}
                    @if($product->images && $product->images->count() > 0)
                    <div class="col-md-12 mb-3">
                        <label><strong>Images</strong></label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($product->images as $img)
                                <img src="{{ asset($img->name) }}" alt="" class="img-thumbnail" style="height:80px; width:80px; object-fit:cover; border-radius:8px;">
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Variations Section --}}
                    <div class="col-md-12 mb-3">
                        <label><strong>Variations</strong></label>
                        @if($product->variations && $product->variations->count() > 0)
                            @foreach($product->variations as $variation)
                                <div class="variation-card">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            @if($variation->sku)
                                                <span class="badge bg-secondary">SKU: {{ $variation->sku }}</span>
                                            @endif
                                            <span class="badge bg-primary">Price: {{ $variation->price ?? $product->price }}</span>
                                            <span class="badge bg-info">Qty: {{ $variation->quantity ?? 0 }}</span>
                                        </div>
                                    </div>
                                    @if($variation->attributes && $variation->attributes->count() > 0)
                                        <div>
                                            @foreach($variation->attributes as $attr)
                                                <span class="variation-attr">{{ $attr->value }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No variations for this product.</p>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

       </div>
    </div>
</div>

{{-- Reject Modal for each product --}}
<div class="modal fade" id="rejectModal{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fa fa-ban"></i> @lang('lang.reject_product'): {{ $product->name }}</h5>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('product.reject', $product->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="rejection_reason_{{ $product->id }}" class="form-label"><strong>@lang('lang.rejection_reason') <span class="text-danger">*</span></strong></label>
                        <textarea class="form-control" id="rejection_reason_{{ $product->id }}" name="rejection_reason" rows="4" placeholder="@lang('lang.rejection_reason_placeholder')" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">@lang('lang.Cancel')</button>
                    <button class="btn btn-danger" type="submit"><i class="fa fa-ban"></i> @lang('lang.reject_product')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl-custom.js')}}"></script>

@endsection
