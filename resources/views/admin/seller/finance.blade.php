@extends('admin.layout.master')
@section('title', trans('lang.seller_finance'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
<style>
.finance-summary .card {
    border-radius: 10px;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}
.finance-summary .card-body {
    padding: 20px;
}
.finance-summary .icon-box {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: #fff;
}
.badge-commission-type {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}
.badge-percentage {
    background-color: #e8f5e9;
    color: #2e7d32;
}
.badge-fixed {
    background-color: #e3f2fd;
    color: #1565c0;
}
.btn-no-hover-primary {
    background-color: transparent !important;
    color: #7366ff !important;
    border-color: #7366ff !important;
}
.btn-no-hover-primary:hover, .btn-no-hover-primary:focus {
    background-color: transparent !important;
    color: #7366ff !important;
    border-color: #7366ff !important;
    box-shadow: none !important;
}
.btn-no-hover-secondary {
    background-color: transparent !important;
    color: #6c757d !important;
    border-color: #6c757d !important;
}
.btn-no-hover-secondary:hover, .btn-no-hover-secondary:focus {
    background-color: transparent !important;
    color: #6c757d !important;
    border-color: #6c757d !important;
    box-shadow: none !important;
}
</style>
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.seller_finance')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Sellers')</li>
<li class="breadcrumb-item active">@lang('lang.seller_finance')</li>
@endsection

@section('content')
<div class="container-fluid">

    {{-- Summary Cards --}}
    <div class="row finance-summary mb-4">
        <div class="col-xl-4 col-md-4">
            <div class="card" style="border-left: 4px solid #7366ff;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box me-3" style="background: linear-gradient(135deg, #7366ff, #a084ee);">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div>
                        <p class="mb-0 text-muted">@lang('lang.total_revenue')</p>
                        <h4 class="mb-0 f-w-600">{{ number_format($grandTotalRevenue, 2) }} <small>@lang('lang.sar')</small></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4">
            <div class="card" style="border-left: 4px solid #2ecc71;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box me-3" style="background: linear-gradient(135deg, #2ecc71, #27ae60);">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div>
                        <p class="mb-0 text-muted">@lang('lang.admin_commission')</p>
                        <h4 class="mb-0 f-w-600">{{ number_format($grandTotalCommission, 2) }} <small>@lang('lang.sar')</small></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4">
            <div class="card" style="border-left: 4px solid #3498db;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box me-3" style="background: linear-gradient(135deg, #3498db, #2980b9);">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div>
                        <p class="mb-0 text-muted">@lang('lang.seller_earnings')</p>
                        <h4 class="mb-0 f-w-600">{{ number_format($grandTotalEarnings, 2) }} <small>@lang('lang.sar')</small></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sellers Table --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>@lang('lang.seller_finance')</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="advance-1">
                            <thead>
                                <tr>
                                    <th>@lang('lang.Seller')</th>
                                    <th>@lang('lang.total_orders')</th>
                                    <th>@lang('lang.total_revenue')</th>
                                    <th>@lang('lang.commission_type')</th>
                                    <th>@lang('lang.commission_rate')</th>
                                    <th>@lang('lang.commission_amount')</th>
                                    <th>@lang('lang.net_earnings')</th>
                                    <th>@lang('lang.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sellers as $seller)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($seller->img_path) }}" alt="" class="rounded-circle me-2" height="35" width="35">
                                            <div>
                                                <strong>{{ $seller->name }}</strong>
                                                <br><small class="text-muted">{{ $seller->shop_name_en ?? $seller->shop_name_ar ?? '-' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $seller->total_orders }}</td>
                                    <td>{{ number_format($seller->total_revenue, 2) }} @lang('lang.sar')</td>
                                    <td>
                                        @if($seller->commission_type == 'percentage')
                                            <span class="badge-commission-type badge-percentage">@lang('lang.percentage')</span>
                                        @else
                                            <span class="badge-commission-type badge-fixed">@lang('lang.fixed_amount')</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($seller->commission_type == 'percentage')
                                            {{ $seller->commission_value }}%
                                        @else
                                            {{ number_format($seller->commission_value, 2) }} @lang('lang.sar')
                                        @endif
                                    </td>
                                    <td><strong>{{ number_format($seller->commission_amount, 2) }}</strong> @lang('lang.sar')</td>
                                    <td>{{ number_format($seller->net_earnings, 2) }} @lang('lang.sar')</td>
                                    <td>
                                        <button class="btn btn-no-hover-primary btn-sm" onclick="openCommissionModal({{ $seller->id }}, '{{ $seller->commission_type ?? 'percentage' }}', {{ $seller->commission_value ?? 0 }}, '{{ addslashes($seller->name) }}')">
                                            <i class="fas fa-edit"></i> @lang('lang.edit')
                                        </button>
                                        <a href="{{ route('seller.edit', $seller->id) }}" class="btn btn-no-hover-secondary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">@lang('lang.no_data')</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Commission Edit Modal --}}
<div class="modal fade" id="commissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="commissionForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-percentage"></i> @lang('lang.commission_settings') - <span id="modalSellerName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">@lang('lang.commission_type')</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="commission_type" id="modal_percentage" value="percentage">
                                <label class="form-check-label" for="modal_percentage">@lang('lang.percentage')</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="commission_type" id="modal_fixed" value="fixed">
                                <label class="form-check-label" for="modal_fixed">@lang('lang.fixed_amount')</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('lang.commission_value') <span id="modal_commission_unit">(%)</span></label>
                        <input type="number" class="form-control" name="commission_value" id="modal_commission_value" step="0.01" min="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>
function openCommissionModal(id, type, value, name) {
    var actionUrl = "{{ route('admin.seller.updateCommission', ':id') }}";
    document.getElementById('commissionForm').action = actionUrl.replace(':id', id);
    document.getElementById('modalSellerName').textContent = name;
    document.getElementById('modal_commission_value').value = value;

    if (type === 'percentage' || type === '') {
        document.getElementById('modal_percentage').checked = true;
        document.getElementById('modal_commission_unit').textContent = '(%)';
    } else {
        document.getElementById('modal_fixed').checked = true;
        document.getElementById('modal_commission_unit').textContent = '(@lang("lang.sar"))';
    }

    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        var modal = new bootstrap.Modal(document.getElementById('commissionModal'));
        modal.show();
    } else {
        $('#commissionModal').modal('show');
    }
}

document.querySelectorAll('#commissionModal input[name="commission_type"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        var unit = this.value === 'percentage' ? '(%)' : '(@lang("lang.sar"))';
        document.getElementById('modal_commission_unit').textContent = unit;
    });
});
</script>
@endsection
