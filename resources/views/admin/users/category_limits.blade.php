@extends('admin.layout.master')
@section('title', __('lang.user_category_limits'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.user_category_limits'): {{ $user->name }}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Users')</li>
<li class="breadcrumb-item active">@lang('lang.user_category_limits')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>@lang('lang.user_category_limits')</h5>
                    <span>@lang('lang.free_ads_limit_hint')</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('lang.Category')</th>
                                    <th>@lang('lang.Status')</th>
                                    <th>@lang('lang.default_limit')</th>
                                    <th>@lang('lang.custom_limit')</th>
                                    <th>@lang('lang.used_ads')</th>
                                    <th>@lang('lang.remaining_ads')</th>
                                    <th>@lang('lang.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category['category_name'] }}</td>
                                    <td>
                                        @if($category['is_free'])
                                        <span class="badge bg-success">@lang('lang.free')</span>
                                        @else
                                        <span class="badge bg-warning">@lang('lang.not_free')</span>
                                        @endif
                                    </td>
                                    <td>{{ $category['default_limit'] }}</td>
                                    <td>
                                        @if($category['has_custom_limit'])
                                        <span class="badge bg-primary">{{ $category['user_limit'] }}</span>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $category['used_ads_count'] }}</td>
                                    <td>
                                        @php
                                        $limit = $category['has_custom_limit'] ? $category['user_limit'] : $category['default_limit'];
                                        $remaining = max(0, $limit - $category['used_ads_count']);
                                        @endphp
                                        <span class="{{ $remaining > 0 ? 'text-success' : 'text-danger' }}">{{ $remaining }}</span>
                                    </td>
                                    <td>
                                        @can('manage user category limits')
                                        <a href="{{ route('admin.userCategoryLimits.edit', [$user->id, $category['category_id']]) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> @lang('lang.edit_limit')
                                        </a>
                                        @if($category['has_custom_limit'])
                                        <form action="{{ route('admin.userCategoryLimits.destroy', [$user->id, $category['category_id']]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('@lang('lang.are_you_sure_delete')')">
                                                <i class="fa fa-undo"></i> @lang('lang.reset_to_default')
                                            </button>
                                        </form>
                                        @endif
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