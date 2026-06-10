<!doctype html>
<html lang="en">
	<head>
		<title>Contact Us</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('assets/css/style_contact.css')}}">
	

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">@lang('lang.get_in_touch')</h3>
									<div id="form-message-warning" class="mb-4">
										
									</div> 
									<div id="form-message-success" class="mb-4" style="display: none;">
										Your message was sent, thank you!
									</div>
									<form method="POST" action="{{route('contactUs')}}" id="contactForm">
										@csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="@lang('lang.Name')" required>
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<input type="tel" class="form-control" name="phone" id="phone" placeholder="@lang('lang.phone_num')" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="description" class="form-control" id="description" cols="30" rows="7" placeholder="@lang('lang.description')"required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="@lang('lang.send')" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-lg-5 p-4">
									<h3 class="mb-4 mt-md-4">@lang('lang.contact_us')</h3>
									
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-whatsapp"></span>
										</div>
										<div class="text pl-3">
											<p><span></span> <a target="_blank" href="https://wa.me/{{$contact->whatsapp_number}}">{{$contact->whatsapp_number}}</a></p>
										</div>
									</div>

									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-facebook"></span>
										</div>
										<div class="text pl-3">
											<p><span></span>{{$contact->facebook}}</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-instagram"></span>
										</div>
										<div class="text pl-3">
											<p>{{$contact->insta}}</p>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<script src="{{asset('assets/js/jquery_contact.min.js')}}"></script>
	<script src="{{asset('assets/js/popper_contact.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap_contact.min.js')}}"></script>
	{{-- <script src="{{asset('assets/js/jquery_contact.validate.min.js')}}"></script> --}}
	<script src="{{asset('assets/js/main_contact.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#contactForm').on('submit', function(event) {
				event.preventDefault();
				$.ajax({
					url: $(this).attr('action'),
					method: $(this).attr('method'),
					data: $(this).serialize(),
					success: function(response) {
						console.log(response);
						$('#form-message-success').text(response.msg).show();
					},
					error: function(response) {
						$('#form-message-warning').text(response.responseJSON.message || 'There was an error sending your message.').show();
					}
				});
			});
		});
	</script>
	</body>
</html>