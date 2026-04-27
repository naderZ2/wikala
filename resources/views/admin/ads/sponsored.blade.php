@extends('admin.layout.master')
@section('title', __('lang.Sponsored_Ads'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Sponsored_Ads')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.ads')</li>
<li class="breadcrumb-item active">@lang('lang.Sponsored_Ads')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>@lang('lang.Sponsored_Ads')</h5>
                    <span>@lang('lang.ads_sorted_by_price')</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('lang.Ad_Number')</th>
                                    <th>@lang('lang.Title')</th>
                                    <th>@lang('lang.Client')</th>
                                    <th>@lang('lang.Sponsored_Price')</th>
                                    <th>@lang('lang.Sponsored_At')</th>
                                    <th>@lang('lang.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads as $ad)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ad->ad_number }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->user?->name ?? '-' }}</td>
                                    <td>{{ $ad->sponsored_price }} @lang('lang.sar')</td>
                                    <td>{{ $ad->sponsored_at?->format('Y-m-d H:i') }}</td>
                                    <td>
                                        @can('view ad')
                                        <a href="{{ route('ads.details', $ad->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endcan
                                        @can('manage ad sponsor')
                                        <a href="{{ route('ads.editSponsor', $ad->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('ads.removeSponsor', $ad->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('@lang('lang.confirm_remove_sponsor')')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection