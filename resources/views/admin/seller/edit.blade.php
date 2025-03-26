@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.edit_Seller')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Sellers')</li>
<li class="breadcrumb-item active"> @lang('lang.edit_Seller')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('seller.update',$seller->id) }}">
                        @csrf
						@method("PUT")
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.Name')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name" value="{{ $seller->name}}" placeholder="name" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>

							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom02">@lang('lang.Email')</label>
								<input class="form-control" id="validationCustom02" type="text" name="email"  value="{{ $seller->email}}"  placeholder="email" required="">
								<div class="valid-feedback">Looks good!</div>
								@error('email')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.Categories')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="categories[]" multiple="multiple" required="">
                                    @forelse ($categories as $category)
									<option value="{{ $category->id }}"  @selected(in_array($category->id, $sellerCategories->toArray()))>{{ $category->name  ." - ".$category->parent->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.Regions')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="cities[]" multiple="multiple" required="">
                                    @forelse ($cities as $city)
									<option value="{{ $city->id }}"  @selected(in_array($city->id, $sellerCities->toArray()))>{{ $city->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>
                            

						</div>
						<div class="row">
						
							<div class="col-md-6 mb-3 ">
								<label for="validationCustom05">@lang('lang.password')</label>
								<input class="form-control" id="password" type="password" placeholder="********" name="password" value="{{ old('password') }}" >
								<div class="invalid-feedback">Please provide a valid password.</div>
							
								<div class="show-hide" onclick="togglePassword()">
									<span class="show "></span> 
								</div>
							</div>
							      <div class="col-md-12 mb-3">
                                <div class="col-lg-12">
                                    <div id="inputFormRow">
                                        <label for="exampleFormControlTextarea4">@lang('lang.image')</label>

                                        <div class="input-group mb-3">
											
											<input class="form-control" id="imageInput" onchange="previewImage(event)" type="file" name="img_path" value="{{ old('img_path') }}"  accept="image/*" >
											
                                        </div>
										<img src="{{ asset($seller?->img_path) }}" id="imagePreview" alt=""  class="image-fluid"  height="150" width="150">







                                    </div>
                
                                </div>
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



<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var showHideIcon = document.querySelector(".show-hide .show");
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        showHideIcon.textContent = ""; 
    } else {
        passwordField.type = "password";
        showHideIcon.textContent = "";
    }
}


function previewImage(event) {
    var image = document.getElementById('imagePreview');
    var file = event.target.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result; // Set image source to the file's data
            image.style.display = 'block'; // Display the image element
        };
        reader.readAsDataURL(file); // Convert image file to base64 string
    }
}

</script>