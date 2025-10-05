@extends('admin.layout.master')
@section('title', __('lang.add_ad'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_ad')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Ads')</li>
<li class="breadcrumb-item active">@lang('lang.add_ad')</li>
@endsection

@section('content')
<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ route('admin.ads.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>@lang('lang.client')</label>
                                <select name="user_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>@lang('lang.category')</label>
                                <select name="category_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>@lang('lang.type')</label>
                                <select name="type_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>@lang('lang.contact_method')</label>
                                <input type="text" name="contact_method" class="form-control" value="{{ old('contact_method') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>@lang('lang.title')</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label>@lang('lang.price')</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}" min="0" step="0.01">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>@lang('lang.negotiable')</label><br>
                                <input type="checkbox" name="negotiable" value="1"> @lang('lang.yes')
                            </div>

                            <div class="col-md-3">
                                <label>@lang('lang.start_date')</label>
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label>@lang('lang.end_date')</label>
                                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>@lang('lang.city')</label>
                                <select name="city_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>@lang('lang.region')</label>
                                <select name="region_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>@lang('lang.description')</label>
                            <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>@lang('lang.main_image')</label>
                            <input type="file" name="main_image" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label>@lang('lang.gallery_images')</label>
                            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label>@lang('lang.status')</label>
                            <select name="status" class="form-control">
                                <option value="under_review">@lang('lang.under_review')</option>
                                <option value="accepted">@lang('lang.accepted')</option>
                                <option value="rejected">@lang('lang.rejected')</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">@lang('lang.save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
@endsection
