<div class="col-12 mt-3 mb-2">
	<h5>@lang('lang.arrive_whats_settings')</h5>
</div>
<div class="col-md-6 mb-3">
	<label for="arriveWhatsBaseUrl">@lang('lang.arrive_whats_base_url')</label>
	<input class="form-control @error('arrive_whats_base_url') is-invalid @enderror"
		id="arriveWhatsBaseUrl" type="url" name="arrive_whats_base_url"
		value="{{ old('arrive_whats_base_url', $settings->arrive_whats_base_url ?? 'https://arrivewhats.com/api') }}" required>
	@error('arrive_whats_base_url')
		<div class="invalid-feedback">{{ $message }}</div>
	@enderror
</div>
<div class="col-md-6 mb-3">
	<label for="arriveWhatsCountryCode">@lang('lang.arrive_whats_country_code')</label>
	<input class="form-control @error('arrive_whats_default_country_code') is-invalid @enderror"
		id="arriveWhatsCountryCode" type="text" name="arrive_whats_default_country_code"
		value="{{ old('arrive_whats_default_country_code', $settings->arrive_whats_default_country_code ?? '965') }}"
		placeholder="965" required>
	@error('arrive_whats_default_country_code')
		<div class="invalid-feedback">{{ $message }}</div>
	@enderror
</div>
<div class="col-md-6 mb-3">
	<label for="arriveWhatsToken">@lang('lang.arrive_whats_token')</label>
	@if(!empty($settings->arrive_whats_token))
		<span class="badge badge-success">@lang('lang.arrive_whats_configured')</span>
	@endif
	<input class="form-control @error('arrive_whats_token') is-invalid @enderror"
		id="arriveWhatsToken" type="password" name="arrive_whats_token"
		value="" autocomplete="new-password">
	<small class="form-text text-muted">@lang('lang.arrive_whats_token_help')</small>
	@error('arrive_whats_token')
		<div class="invalid-feedback">{{ $message }}</div>
	@enderror
	@if(!empty($settings->arrive_whats_token))
		<div class="form-check mt-2">
			<input type="hidden" name="remove_arrive_whats_token" value="0">
			<input class="form-check-input" id="removeArriveWhatsToken" type="checkbox"
				name="remove_arrive_whats_token" value="1"
				{{ old('remove_arrive_whats_token') ? 'checked' : '' }}>
			<label class="form-check-label" for="removeArriveWhatsToken">
				@lang('lang.arrive_whats_remove_token')
			</label>
		</div>
	@endif
</div>
<div class="col-md-6 mb-3">
	<label for="arriveWhatsReceiptPhone">@lang('lang.arrive_whats_receipt_phone')</label>
	<input class="form-control @error('arrive_whats_receipt_phone') is-invalid @enderror"
		id="arriveWhatsReceiptPhone" type="text" name="arrive_whats_receipt_phone"
		value="{{ old('arrive_whats_receipt_phone', $settings->arrive_whats_receipt_phone ?? '') }}"
		placeholder="+965...">
	@error('arrive_whats_receipt_phone')
		<div class="invalid-feedback">{{ $message }}</div>
	@enderror
</div>
