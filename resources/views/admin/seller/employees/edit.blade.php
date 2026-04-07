@extends('admin.layout.master')
@section('title', 'Edit Employee')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('breadcrumb-title')
<h3> Edit Employee </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Sellers</li>
<li class="breadcrumb-item"><a href="{{ route('seller.edit', $parentSeller->id) }}">{{ $parentSeller->name }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.seller.employees.index', $parentSeller->id) }}">Employees</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" action="{{ route('admin.seller.employees.update', $employee->id) }}">
                        @csrf
                        @method('PUT')
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="name">@lang('lang.Name')</label>
								<input class="form-control" id="name" type="text" name="name" value="{{ $employee->name }}" required="">
								@error('name')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
							<div class="col-md-6 mb-3">
								<label for="email">@lang('lang.Email')</label>
								<input class="form-control" id="email" type="email" name="email" value="{{ $employee->email }}" required="">
								@error('email')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
                            <div class="col-md-6 mb-3">
								<label for="phone">Phone</label>
								<input class="form-control" id="phone" type="text" name="phone" value="{{ $employee->phone }}">
								@error('phone')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
                            <div class="col-md-6 mb-3">
								<label for="password">@lang('lang.password') (Leave blank to keep current)</label>
								<input class="form-control" id="password" type="password" name="password" placeholder="********">
								@error('password')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>

                            <div class="col-md-12 mb-3">
                                <label for="roles">Roles</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="roles" name="roles[]" multiple="multiple" required="">
                                    @foreach ($roles as $role)
									    <option value="{{ $role->name }}" @selected(in_array($role->name, $employeeRoles)) >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
                            </div>

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
