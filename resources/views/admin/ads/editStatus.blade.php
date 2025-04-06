@extends('admin.layout.master')
@section('title', __('lang.change_status'))

@section('breadcrumb-title')
<h3>@lang('lang.change_status')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.ads')</li>
<li class="breadcrumb-item active">@lang('lang.change_status')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
					
                    <form id="statusForm" action="{{ route('ads.changeStatus', $ad->id) }}" method="POST" onsubmit="return confirmStatusChange()">
                        @csrf

                        {{-- Ad Info --}}
                        <div class="mb-3">
                            <label class="form-label">@lang('lang.Ad_Number')</label>
                            <input type="text" class="form-control" value="{{ $ad->ad_number }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('lang.Title')</label>
                            <input type="text" class="form-control" value="{{ $ad->title }}" readonly>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">@lang('lang.Status')</label>
                            <select name="status" id="status" class="form-select" onchange="toggleRejectedReason()">
                                <option value="under_review" {{ $ad->status == 'under_review' ? 'selected' : '' }}>@lang('lang.under_review')</option>
                                <option value="accepted" {{ $ad->status == 'accepted' ? 'selected' : '' }}>@lang('lang.accepted')</option>
                                <option value="rejected" {{ $ad->status == 'rejected' ? 'selected' : '' }}>@lang('lang.rejected')</option>
                            </select>
                        </div>

                        {{-- Rejected Reason --}}
                        <div class="mb-3" id="rejectedReasonBlock" style="display: {{ $ad->status == 'rejected' ? 'block' : 'none' }};">
                            <label for="rejected_id" class="form-label">@lang('lang.Rejected_Reason')</label>
                            <select name="rejected_id" id="rejected_id" class="form-select">
                                <option value="">@lang('lang.select')</option>
                                @foreach ($rejectedReasons as $reason)
                                    <option value="{{ $reason->id }}" {{ $ad->rejected_id == $reason->id ? 'selected' : '' }}>
                                        {{ $reason->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-success">@lang('lang.update_status')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        toggleRejectedReason(); // initialize on load
    });

    function toggleRejectedReason() {
        const status = document.getElementById('status').value;
        const reasonBlock = document.getElementById('rejectedReasonBlock');
        const submitBtn = document.getElementById('submitBtn');

        // Show/hide rejected reason dropdown
        reasonBlock.style.display = (status === 'rejected') ? 'block' : 'none';

        // Enable or disable submit button
        submitBtn.disabled = (status === 'under_review');
    }

    function confirmStatusChange() {
        const oldStatus = "{{ $ad->status }}";
        const newStatus = document.getElementById('status').value;

        if (oldStatus === newStatus) {
            return confirm("@lang('lang.Are_you_sure_you_want_to_submit_without_changes?')");
        }

        return true;
    }
</script>
@endsection
