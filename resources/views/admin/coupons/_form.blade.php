@php $c = $coupon ?? null; @endphp

<div class="row">
	<div class="col-md-6 mb-3">
		<label>@lang('lang.code')</label>
		<input class="form-control" type="text" name="code" value="{{ old('code', $c?->code) }}" required>
	</div>
	<div class="col-md-6 mb-3">
		<label>@lang('lang.Type')</label>
		<select class="form-control" name="discount_type" required>
			<option value="percentage" {{ old('discount_type', $c?->discount_type) === 'percentage' ? 'selected' : '' }}>@lang('lang.percentage')</option>
			<option value="fixed" {{ old('discount_type', $c?->discount_type) === 'fixed' ? 'selected' : '' }}>@lang('lang.fixed')</option>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<label>@lang('lang.Value')</label>
		<input class="form-control" type="number" step="0.01" name="value" value="{{ old('value', $c?->value) }}" required>
		<small class="text-muted">@lang('lang.coupon_value_hint')</small>
	</div>
	<div class="col-md-6 mb-3">
		<label>@lang('lang.coupon_max_discount')</label>
		<input class="form-control" type="number" step="0.01" name="max_discount_amount" value="{{ old('max_discount_amount', $c?->max_discount_amount) }}">
		<small class="text-muted">@lang('lang.coupon_max_discount_hint')</small>
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<label>@lang('lang.coupon_min_amount')</label>
		<input class="form-control" type="number" step="0.01" name="min_order_amount" value="{{ old('min_order_amount', $c?->min_order_amount) }}">
	</div>
	<div class="col-md-6 mb-3">
		<label>@lang('lang.coupon_max_amount')</label>
		<input class="form-control" type="number" step="0.01" name="max_order_amount" value="{{ old('max_order_amount', $c?->max_order_amount) }}">
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<label>@lang('lang.usage_limit')</label>
		<input class="form-control" type="number" name="usage_limit" value="{{ old('usage_limit', $c?->usage_limit) }}">
		<small class="text-muted">@lang('lang.usage_limit_hint')</small>
	</div>
	<div class="col-md-6 mb-3">
		<label>@lang('lang.usage_per_user')</label>
		<input class="form-control" type="number" name="usage_limit_per_user" value="{{ old('usage_limit_per_user', $c?->usage_limit_per_user) }}">
		<small class="text-muted">@lang('lang.usage_per_user_hint')</small>
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<label>@lang('lang.Start_Date')</label>
		<input class="form-control" type="datetime-local" name="starts_at"
			value="{{ old('starts_at', $c?->starts_at?->format('Y-m-d\TH:i')) }}">
	</div>
	<div class="col-md-6 mb-3">
		<label>@lang('lang.End_Date')</label>
		<input class="form-control" type="datetime-local" name="expires_at"
			value="{{ old('expires_at', $c?->expires_at?->format('Y-m-d\TH:i')) }}">
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<label>@lang('lang.coupon_sellers')</label>
		<select class="form-control select2" name="seller_ids[]" multiple="multiple">
			@foreach ($sellers as $seller)
				<option value="{{ $seller->id }}" {{ in_array($seller->id, old('seller_ids', $c ? $c->sellers->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
					{{ $seller->name }} {{ $seller->shop_name_en ? '('.$seller->shop_name_en.')' : '' }}
				</option>
			@endforeach
		</select>
		<small class="text-muted">@lang('lang.coupon_sellers_hint')</small>
	</div>
	<div class="col-md-6 mb-3">
		<label>@lang('lang.coupon_products')</label>
		<select class="form-control select2" name="product_ids[]" multiple="multiple">
			@foreach ($products as $product)
				<option value="{{ $product->id }}" {{ in_array($product->id, old('product_ids', $c ? $c->products->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
					{{ $product->name_en }} ({{ $product->seller->shop_name_en ?? '' }})
				</option>
			@endforeach
		</select>
		<small class="text-muted">@lang('lang.coupon_products_hint')</small>
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<label>@lang('lang.Status')</label>
		<select class="form-control" name="active">
			<option value="1" {{ old('active', $c?->active ?? 1) ? 'selected' : '' }}>@lang('lang.active')</option>
			<option value="0" {{ old('active', $c?->active ?? 1) ? '' : 'selected' }}>@lang('lang.inactive')</option>
		</select>
	</div>
</div>
