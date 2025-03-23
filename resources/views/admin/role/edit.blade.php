@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_category')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Categories')</li>
<li class="breadcrumb-item active">@lang('lang.add_category')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" action="{{ route('admin.role_permission') }}">
                        @csrf
                        <input type="hidden" name="role_id" value="{{ $role->id }}">
						<div class="row">
                            @foreach ($permissions as  $permission)                                                            
                                <div class="col-md-4">
                                        <div class="card-body animate-chk">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="d-block" for="chk-ani{{$loop->iteration}}">
                                                    <input class="checkbox_animated" id="chk-ani{{$loop->iteration}}" type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                                    @checked(in_array($permission->id, $rolePermissions->toArray()))>           
                                                    {{ $permission->name }}
                                                    
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @endforeach
						</div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">@lang('lang.edit')</button>

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
@endsection