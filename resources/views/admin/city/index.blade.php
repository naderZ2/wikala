@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.regions')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.regions')</li>
@endsection

@section('content')
<div class="container-fluid">
    @error('city')
    <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>{{ $message }}</strong>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    <div class="row">
        <div class="d-flex justify-content-end col-sm-12">
            @can('create city')
            <a href="{{route('city.create')}}" class="btn btn-primary">@lang('lang.add_region')</a>
            @endcan
        </div>

        <div class="d-flex justify-content-start col-sm-12 mt-3 gap-3">
            <div class="col-sm-6 p-0">
                <label class="form-label font-weight-bold">@lang('lang.country')</label>
                <select class="js-example-placeholder-multiple col-sm-12" id="countryFilter" name="country_id">
                    <option value=""></option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ app()->getLocale() == "en" ? $country->name_en : $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 p-0">
                <label class="form-label font-weight-bold">@lang('lang.governorate') / @lang('lang.region')</label>
                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="parent_id" disabled>
                    <option value=""></option>
                </select>
            </div>
        </div>

        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="advance-1">
                            <thead>
                                <tr>
                                    <th>@lang('lang.governorate')</th>
                                    {{-- <th>@lang('lang.region')</th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="areasTable">
                                @forelse ($cities as $city)
                                <tr>
                                    <td>{{ app()->getLocale() == "en" ? $city->name_en : $city->name_ar }}</td>
                                    {{-- <td>{{ $city->parent->name ?? __('lang.main_region') }}</td> --}}
                                    <td>
                                        @can('update city')
                                        <button class="btn btn-primary" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            onclick="getRecord({{ json_encode($city) }})">
                                            @lang('lang.edit')
                                        </button>
                                        @endcan
                                        @can('delete city')
                                        <form action="{{ route('dashboard.city.destroy') }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $city->id }}">
                                            <button class="btn btn-danger" type="submit">@lang('lang.remove')</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">@lang('lang.no_data')</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('lang.edit')</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data"
                    action="{{ route('dashboard.city.update') }}">
                    @csrf
                    <input type="hidden" id="section_id" name="id">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="section_name">@lang('lang.name_ar')</label>
                            <input class="form-control" id="section_name_ar" type="text" name="name_ar" value=""
                                placeholder="name" required="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="section_name">@lang('lang.name_en')</label>
                            <input class="form-control" id="section_name_en" type="text" name="name_en" value=""
                                placeholder="name" required="">
                        </div>
                        <div class="col-md-12 mb-3" id="edit_country_div">
                            <label for="edit_country_id">@lang('lang.country')</label>
                            <select class="form-control" id="edit_country_id" name="country_id">
                                <option value=""></option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ app()->getLocale() == "en" ? $country->name_en : $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">@lang('lang.close')</button>
                        <button class="btn btn-secondary" type="submit">@lang('lang.edit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>

<script>
// Filter cities on Country select
$('#countryFilter').on('change', function () {
    var countryId = $(this).val();
    $('#validationCustom03').html('<option value=""></option>').val('').trigger('change');
    $('#areasTable').html('');

    if (countryId) {
        $('#validationCustom03').prop('disabled', false);
        $.ajax({
            url: "{{ route('get_city') }}?country_id=" + countryId,
            type: 'get',
            dataType: 'json',
            success: function (res) {
                if (res.length > 0) {
                    res.forEach(function (item) {
                        $('#validationCustom03').append(`
                            <option value="${item.id}">${document.documentElement.dir == 'rtl' ? item.name_ar : item.name_en}</option>
                        `);
                        
                        $('#areasTable').append(`
                            <tr>
                                <td>${document.documentElement.dir == 'rtl' ? item.name_ar : item.name_en}</td>
                                <td>
                                    @can('update city')
                                    <button class="btn btn-primary edit-btn" 
                                            type="button"
                                            data-record='${JSON.stringify(item)}' 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal">
                                        @lang('lang.edit')
                                    </button>
                                    @endcan
                                    @can('delete city')
                                    <form action="{{ route('dashboard.city.destroy') }}" method="POST" style="display:inline-block;">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="id" value="${item.id}">
                                        <button class="btn btn-danger" type="submit">@lang('lang.remove')</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    $('#areasTable').html('<tr><td colspan="2">@lang('lang.no_data')</td></tr>');
                }
            }
        });
    } else {
        $('#validationCustom03').prop('disabled', true);
        location.reload();
    }
});

// Filter regions on City select
$('#validationCustom03').on('change', function () {
    var regionId = $(this).val();
    if (!regionId) {
        return;
    }
    $('#areasTable').html('');
    $.ajax({
        url: "{{ route('get_city') }}?region_id=" + regionId,
        type: 'get',
        dataType: 'json',
        success: function (res) {
            if (res.length > 0) {
                res.forEach(function (item) {
                    $('#areasTable').append(`
                        <tr>
                            <td>${document.documentElement.dir == 'rtl' ? item.name_ar : item.name_en}</td>
                            <td>
                                @can('update city')
                                <button class="btn btn-primary edit-btn" 
                                        type="button"
                                        data-record='${JSON.stringify(item)}' 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal">
                                    @lang('lang.edit')
                                </button>
                                @endcan
                                @can('delete city')
                                <form action="{{ route('dashboard.city.destroy') }}" method="POST" style="display:inline-block;">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="${item.id}">
                                    <button class="btn btn-danger" type="submit">@lang('lang.remove')</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    `);
                });
            } else {
                $('#areasTable').html('<tr><td colspan="2">@lang('lang.no_data')</td></tr>');
            }
        }
    });
});

// Use event delegation to handle clicks on dynamically added Edit buttons
$(document).on('click', '.edit-btn', function () {
    var record = $(this).data('record');
    getRecord(record);
});

// Populate modal with old data for editing
function getRecord(data) {
    $('#section_name_ar').val(data.name_ar || '');
    $('#section_name_en').val(data.name_en || '');
    $('#section_id').val(data.id || '');
    
    if (!data.parent_id) {
        $('#edit_country_div').show();
        $('#edit_country_id').val(data.country_id || '');
    } else {
        $('#edit_country_div').hide();
        $('#edit_country_id').val('');
    }
}
</script>
@endsection
