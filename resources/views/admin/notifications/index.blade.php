@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">


@endsection

@section('style')

@endsection

@section('breadcrumb-title')
<h3> @lang('lang.Notifications') </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard') </li>
<li class="breadcrumb-item active">@lang('lang.Notifications')</li>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">   
           <div class="d-flex justify-content-end col-sm-12">
				@can('add notification')
					<a href="{{route('admin.notifications.create')}}"  class="btn btn-primary">@lang('lang.add_slider')</a>
				@endcan	
        	</div>
            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('lang.Title')</th>
                                        <th>@lang('lang.Body')</th>
                                        <th>@lang('lang.Type')</th>
                                        <th>@lang('lang.Seller')</th>
                                        <th>@lang('lang.Product')</th>
                                        <th>@lang('lang.region')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($notifications as  $notification)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ app()->getLocale() == "en"? $notification->name_en:$notification->name_ar }}</td>
                                        <td>{{ app()->getLocale() == "en"? $notification->description_en:$notification->description_ar }}</td>
                                        <td>
                                            @if ($notification->type == 1)
                                                <span class="badge badge-primary">
                                                    عام
                                                </span>
                                                
                                            @endif
                                        </td>
                                        <td>
                                            {{ $notification->seller->name ??""}}
                                        
                                        </td>
                                        <td>
                                            {{ $notification->product->name??"" }}
                                        
                                        </td>
                                        <td>
                                            {{ $notification->region->name ??""}}
                                        
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.notifications.delete',$notification->id) }}" onclick="getId({{ $notification->id }})" method="get" id="form_id">
                                                @csrf
                                                <input type="hidden" name="id" id="notification_id">
                                                @can('delete notification')
                                                <button id="{{ $loop->iteration }}" class="btn btn-danger sweet-5" onclick="test()" type="button" >@lang('lang.remove')</button>
                                                @endcan	
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('lang.Title')</th>
                                        <th>@lang('lang.Body')</th>
                                        <th>@lang('lang.Type')</th>
                                        <th>@lang('lang.Seller')</th>
                                        <th>@lang('lang.Product')</th>
                                        <th>@lang('lang.region')</th>
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


@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>

<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>

@endsection

<script>
	function getId(id){
	    document.getElementById("notification_id").value=id;
   }
</script>