@extends('admin.layout.master')
@section('title', __('lang.add_home_page_category'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_home_page_category')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.home_page_categories')</li>
<li class="breadcrumb-item active">@lang('lang.add_home_page_category')</li>
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
                    <form class="needs-validation" novalidate method="POST" action="{{ route('home_page_category.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>@lang('lang.name_ar')</label>
                                <input class="form-control" type="text" name="name_ar" value="{{ old('name_ar') }}" required>
                                <div class="invalid-feedback">@lang('lang.required')</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>@lang('lang.name_en')</label>
                                <input class="form-control" type="text" name="name_en" value="{{ old('name_en') }}" required>
                                <div class="invalid-feedback">@lang('lang.required')</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>@lang('lang.Category')</label>
                                <select class="form-control select2" name="category_id" required>
                                    <option value="">@lang('lang.Choose')</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ app()->getLocale() == 'en' ? $category->name_en : $category->name_ar }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@lang('lang.required')</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>@lang('lang.Sort_Order')</label>
                                <input class="form-control" type="number" name="sort_order" value="{{ old('sort_order') }}" required>
                                <div class="invalid-feedback">@lang('lang.required')</div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">@lang('lang.save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
