@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.edit_admin')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.admins')</li>
<li class="breadcrumb-item active"> @lang('lang.edit_admin')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('admins.update',$admin->id) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $admin->id }}">
						@method("PUT")
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.Name')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name" value="{{ $admin->name}}" placeholder="name" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>

							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom02">@lang('lang.Email')</label>
								<input class="form-control" id="validationCustom02" type="text" name="email"  value="{{ $admin->email}}"  placeholder="email" required="">
								<div class="valid-feedback">Looks good!</div>
								@error('email')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
                        
						</div>
						<div class="row">
						    <div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.Roles')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="role_id"  required="">
                                    @forelse ($roles as $role)
									{{-- <option value="{{ $category->id }}"  @selected(in_array($category->id, $sellerCategories->toArray()))>{{ $category->name }}</option> --}}
									<option value="{{ $role->id }}" @selected($role->id == $admin->roles()->first()->id)>{{ $role->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>

							<div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.active')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="active"  required="">
									<option value="1"  @selected($admin->active == true)>@lang('lang.active')</option>
									<option value="0"  @selected($admin->active == false)>@lang('lang.inactive')</option>
                                </select>
                                <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom05">@lang('lang.password')</label>
								<input class="form-control" id="validationCustom05" type="password" placeholder="********" name="password" value="{{ old('password') }}" >
								<div class="invalid-feedback">Please provide a valid password.</div>
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