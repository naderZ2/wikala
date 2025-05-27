@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.home_page_categories')</h3>
@endsection


@section('style')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.home_page_categories')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="d-flex justify-content-end col-sm-12">
            <a href="{{route('home_page_category.create')}}" class="btn btn-primary">@lang('lang.Add')</a>
        </div>
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="advance-1">
                            <thead>
                                <tr>
                                    <th>@lang('lang.Name')</th>
                                    <th>@lang('lang.Category')</th>
                                    <th>@lang('lang.Sort_Order')</th>
                                    <th>@lang('lang.actions')</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ app()->getLocale() == 'en' ? $item->name_en : $item->name_ar }}</td>
                                        <td>{{ $item->category ? (app()->getLocale() == 'en' ? $item->category->name_en : $item->category->name_ar) : '' }}</td>
                                        <td>{{ $item->sort_order }}</td>
                                        <td>
                                            <a href="{{ route('home_page_category.edit', $item->id) }}" class="btn btn-sm btn-info">@lang('lang.edit')</a>
                                            <form action="{{ route('home_page_category.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('@lang('lang.confirm_delete')')">@lang('lang.Delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
								<tr>
									<th>@lang('lang.Name')</th>
                                    <th>@lang('lang.Category')</th>
                                    <th>@lang('lang.Sort_Order')</th>
                                    <th>@lang('lang.actions')</th>
                                   								
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
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

@endsection

