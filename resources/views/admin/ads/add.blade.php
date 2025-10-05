@extends('admin.layout.master')
@section('title', __('lang.add_ad'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
<style>
  .img-thumb{height:70px;width:70px;object-fit:cover;border-radius:8px;margin:4px;border:1px solid #eee}
</style>
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
            <ul class="mb-0">
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
                    <form class="needs-validation" novalidate method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('ads.store') }}">
                        @csrf

                        {{-- Client & Category --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.client')</label>
                                <select name="user_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@lang('lang.client') @lang('lang.required')</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.category')</label>
                                <select name="category_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Type & Contact --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.type')</label>
                                <select name="type_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.contact_method')</label>
                                <input type="text" name="contact_method" class="form-control" value="{{ old('contact_method') }}" required>
                            </div>
                        </div>

                        {{-- Title & Price --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.title')</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.price')</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}" min="0" step="0.01">
                            </div>
                        </div>

                        {{-- Negotiable & Dates --}}
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label d-block">@lang('lang.negotiable')</label>
                                <input type="hidden" name="negotiable" value="0">
                                <input type="checkbox" name="negotiable" value="1" @checked(old('negotiable'))> @lang('lang.yes')
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">@lang('lang.start_date')</label>
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">@lang('lang.end_date')</label>
                                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">@lang('lang.status')</label>
                                <select name="status" class="form-control">
                                    <option value="under_review" @selected(old('status')=='under_review')>@lang('lang.under_review')</option>
                                    <option value="accepted" @selected(old('status')=='accepted')>@lang('lang.accepted')</option>
                                    <option value="rejected" @selected(old('status')=='rejected')>@lang('lang.rejected')</option>
                                </select>
                            </div>
                        </div>

                        {{-- City & Region --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.city')</label>
                                <select name="city_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @selected(old('city_id') == $city->id)>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.region')</label>
                                <select name="region_id" class="js-example-basic-single form-control" required>
                                    <option value="">@lang('lang.select')</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" @selected(old('region_id') == $region->id)>{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="form-label">@lang('lang.description')</label>
                            <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
                        </div>

                        {{-- Main Image + Preview --}}
                        <div class="mb-3">
                            <label class="form-label">@lang('lang.main_image')</label>
                            <input type="file" name="main_image" id="main_image" class="form-control" accept="image/*">
                            <div id="mainImagePreview" class="mt-2"></div>
                        </div>

                        {{-- Gallery Images + Preview --}}
                        <div class="mb-3">
                            <label class="form-label">@lang('lang.gallery_images')</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
                            <div id="imagesPreview" class="d-flex flex-wrap mt-2"></div>
                        </div>

                        {{-- Attributes --}}
                        <div class="mb-2 d-flex align-items-center justify-content-between">
                            <label class="form-label m-0">@lang('lang.attributes')</label>
                            <button type="button" id="addAttributeRow" class="btn btn-sm btn-outline-primary">@lang('lang.add') @lang('lang.attribute')</button>
                        </div>

                        <div id="attributesWrapper">
                            {{-- first row (template instance 0) --}}
                            <div class="attribute-row row g-2 align-items-end mb-2" data-index="0">
                                <div class="col-md-5">
                                    <label class="form-label">@lang('lang.attribute')</label>
                                    <select name="attributes[0][id]" class="js-example-basic-single form-control">
                                        <option value="">@lang('lang.select')</option>
                                        @foreach($attributes as $attr)
                                            <option value="{{ $attr->id }}">{{ $attr->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">@lang('lang.value')</label>
                                    <input type="text" name="attributes[0][value]" class="form-control" placeholder="@lang('lang.value')">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-outline-danger w-100 remove-attr" disabled>&times;</button>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-3" type="submit">@lang('lang.save')</button>
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
<script>
(function(){
  // --- main image preview
  const mainInput = document.getElementById('main_image');
  const mainPreview = document.getElementById('mainImagePreview');
  if(mainInput){
    mainInput.addEventListener('change', function(){
      mainPreview.innerHTML = '';
      const f = this.files?.[0];
      if(!f) return;
      const img = document.createElement('img');
      img.className = 'img-thumb';
      img.src = URL.createObjectURL(f);
      mainPreview.appendChild(img);
    });
  }

  // --- gallery preview
  const imgs = document.getElementById('images');
  const imgsPreview = document.getElementById('imagesPreview');
  if(imgs){
    imgs.addEventListener('change', function(){
      imgsPreview.innerHTML = '';
      Array.from(this.files || []).forEach(f=>{
        const img = document.createElement('img');
        img.className = 'img-thumb';
        img.src = URL.createObjectURL(f);
        imgsPreview.appendChild(img);
      });
    });
  }

  // --- attributes dynamic rows
  const wrapper = document.getElementById('attributesWrapper');
  const btnAdd = document.getElementById('addAttributeRow');
  let idx = 0;

  btnAdd.addEventListener('click', function(){
    idx++;
    const row = document.createElement('div');
    row.className = 'attribute-row row g-2 align-items-end mb-2';
    row.setAttribute('data-index', idx);

    row.innerHTML = `
      <div class="col-md-5">
        <label class="form-label">@lang('lang.attribute')</label>
        <select name="attributes[${idx}][id]" class="js-example-basic-single form-control">
          <option value="">@lang('lang.select')</option>
          @foreach($attributes as $attr)
            <option value="{{ $attr->id }}">{{ $attr->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-5">
        <label class="form-label">@lang('lang.value')</label>
        <input type="text" name="attributes[${idx}][value]" class="form-control" placeholder="@lang('lang.value')">
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-outline-danger w-100 remove-attr">&times;</button>
      </div>
    `;
    wrapper.appendChild(row);

    // re-init select2 on new select
    $(row).find('select').select2({ width: '100%' });
  });

  // remove attribute row
  wrapper.addEventListener('click', function(e){
    if(e.target.classList.contains('remove-attr')){
      const rows = wrapper.querySelectorAll('.attribute-row');
      if(rows.length > 1){
        e.target.closest('.attribute-row').remove();
      }
    }
  });
})();
</script>
@endsection
