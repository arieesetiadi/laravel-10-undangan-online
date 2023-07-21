{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
$sidebar['variants'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <div class="page-description">
                <h3 class="fw-bold">{{ $edit ? 'Ubah' : 'Tambah' }} {{ $title }}</h3>
                <h6 class="mt-2">
                    {{ Breadcrumbs::render('cms.variants.action', $edit ? 'Ubah' : 'Tambah') }}
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" id="variant-{{ $edit ? 'edit' : 'create' }}" action="{{ $edit ? route('cms.variants.update', $variant->id) : route('cms.variants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($edit ? 'PUT' : 'POST')

                        {{-- Input Name --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-name" for="name">
                                Nama Paket <span class="text-danger">*</span>
                            </label>

                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $variant->name ?? null) }}" aria-describedby="label-name" placeholder="e.g. Paket Gold">

                            @error('name')
                            <label class="text-danger mt-2" for="name">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Price --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-price" for="price">
                                Harga Paket <span class="text-danger">*</span>
                            </label>

                            <input class="form-control number-input" id="price" name="price" type="text" value="{{ old('price', $variant->price ?? null) }}" aria-describedby="label-price" placeholder="e.g. 350000">

                            @error('price')
                            <label class="text-danger mt-2" for="price">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Discount Status --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-discount-status" for="discount-status">
                                Diskon <span class="text-danger">*</span>
                            </label>

                            <select onchange="toggleNextInput(event, '#discount-type, #discount-amount')" id="discount-status" name="discount_status" class="form-select" aria-label="Allow Discount Type"
                                aria-describedby="label-discount-status">
                                <option selected hidden disabled>Berisi Diskon?</option>
                                <option value="1" {{ old('discount_status')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('discount_status')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('discount_status')
                            <label class="text-danger mt-2" for="discount_status">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Discount Type --}}
                        <div class="mb-4 col-12 col-lg-3">
                            <label class="form-label d-block" id="label-discount-type" for="discount-type">
                                Jenis Diskon <span class="text-danger">*</span>
                            </label>

                            <select {{ old('discount_status')==null || old('discount_status')==='0' ? 'disabled' : '' }} onchange="toggleNextInput(event, '#discount-amount')" id="discount-type" name="discount_type" class="form-select"
                                aria-label="Allow Discount Type" aria-describedby="label-discount-type">
                                <option selected value="">Pilih Jenis Diskon</option>
                                @foreach (DiscountType::values() as $discountType)
                                <option value="{{ $discountType }}">{{ str($discountType)->lower()->ucfirst() }}</option>
                                @endforeach
                            </select>

                            @error('discount_type')
                            <label class="text-danger mt-2" for="discount_type">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Discount Amount --}}
                        <div class="mb-4 col-12 col-lg-3">
                            <label class="form-label d-block" id="label-discount-amount" for="discount-amount">
                                Jumlah Diskon
                            </label>

                            <input {{ old('discount_status')==null || old('discount_status')==='0' ? 'disabled' : '' }} class="form-control number-input" id="discount-amount" name="discount_amount" type="text"
                                value="{{ old('discount_amount', $variant->discount_amount ?? null) }}" aria-describedby="label-discount_amount" placeholder="e.g. 50000">

                            @error('discount_amount')
                            <label class="text-danger mt-2" for="discount_amount">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <hr class="text-dark">
                        </div>

                        {{-- Input Allow Galleries --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-galleries" for="allow-galleries">
                                Galeri <span class="text-danger">*</span>
                            </label>

                            <select onchange="toggleNextInput(event, '#max-galleries')" id="allow-galleries" name="allow_galleries" class="form-select" aria-label="Allow galleries" aria-describedby="label-allow-galleries">
                                <option selected hidden disabled>Berisi Galeri?</option>
                                <option value="1" {{ old('allow_galleries')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_galleries')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_galleries')
                            <label class="text-danger mt-2" for="allow_galleries">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Max Galleries --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-max-galleries" for="max-galleries">
                                Batas Maksimal Galeri
                            </label>

                            <input {{ old('allow_galleries')==null || old('allow_galleries')==='0' ? 'disabled' : '' }} class="form-control number-input" id="max-galleries" name="max_galleries" type="text"
                                value="{{ old('max_galleries', $variant->max_galleries ?? null) }}" aria-describedby="label-max-galleries" placeholder="e.g. 15">

                            @error('max_galleries')
                            <label class="text-danger mt-2" for="max_galleries">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Videos --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-videos" for="allow-videos">
                                Video <span class="text-danger">*</span>
                            </label>

                            <select onchange="toggleNextInput(event, '#max-videos')" id="allow-videos" name="allow_videos" class="form-select" aria-label="Allow videos" aria-describedby="label-allow-videos">
                                <option selected hidden disabled>Berisi Video?</option>
                                <option value="1" {{ old('allow_videos')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_videos')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_videos')
                            <label class="text-danger mt-2" for="allow_videos">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Max Videos --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-max-videos" for="max-videos">
                                Batas Maksimal Video
                            </label>

                            <input {{ old('allow_videos')==null || old('allow_videos')==='0' ? 'disabled' : '' }} class="form-control number-input" id="max-videos" name="max_videos" type="text"
                                value="{{ old('max_videos', $variant->max_videos ?? null) }}" aria-describedby="label-max-videos" placeholder="e.g. 2">

                            @error('max_videos')
                            <label class="text-danger mt-2" for="max_videos">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Couple Photos --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-couple-photos" for="allow-couple-photos">
                                Foto Pasangan <span class="text-danger">*</span>
                            </label>

                            <select id="allow-couple-photos" name="allow_couple_photos" class="form-select" aria-label="Allow couple photos" aria-describedby="label-allow-couple-photos">
                                <option selected hidden disabled>Berisi Foto Pasangan?</option>
                                <option value="1" {{ old('allow_couple_photos')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_couple_photos')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_couple_photos')
                            <label class="text-danger mt-2" for="allow_couple_photos">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Google Maps --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-google-maps" for="allow-google-maps">
                                Google Maps <span class="text-danger">*</span>
                            </label>

                            <select id="allow-google-maps" name="allow_google_maps" class="form-select" aria-label="Allow Google Maps" aria-describedby="label-allow-google-maps">
                                <option selected hidden disabled>Berisi Google Maps?</option>
                                <option value="1" {{ old('allow_google_maps')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_google_maps')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_google_maps')
                            <label class="text-danger mt-2" for="allow_google_maps">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Countdown --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-countdown" for="allow-countdown">
                                Countdown <span class="text-danger">*</span>
                            </label>

                            <select id="allow-countdown" name="allow_countdown" class="form-select" aria-label="Allow Countdown" aria-describedby="label-allow-countdown">
                                <option selected hidden disabled>Berisi Countdown?</option>
                                <option value="1" {{ old('allow_countdown')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_countdown')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_countdown')
                            <label class="text-danger mt-2" for="allow_countdown">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Backsound --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-backsound" for="allow-backsound">
                                Musik Latar <span class="text-danger">*</span>
                            </label>

                            <select id="allow-backsound" name="allow_backsound" class="form-select" aria-label="Allow Backsound" aria-describedby="label-allow-backsound">
                                <option selected hidden disabled>Berisi Musik Latar?</option>
                                <option value="1" {{ old('allow_backsound')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_backsound')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_backsound')
                            <label class="text-danger mt-2" for="allow_backsound">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Guest Book --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-guest-book" for="allow-guest-book">
                                Buku Tamu <span class="text-danger">*</span>
                            </label>

                            <select id="allow-guest-book" name="allow_guest_book" class="form-select" aria-label="Allow Guest Book" aria-describedby="label-allow-guest-book">
                                <option selected hidden disabled>Berisi Buku Tamu?</option>
                                <option value="1" {{ old('allow_guest_book')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_guest_book')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_guest_book')
                            <label class="text-danger mt-2" for="allow_guest_book">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Guest Target --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-guest-target" for="allow-guest-target">
                                Nama Tamu <span class="text-danger">*</span>
                            </label>

                            <select id="allow-guest-target" name="allow_guest_target" class="form-select" aria-label="Allow Guest Target" aria-describedby="label-allow-guest-target">
                                <option selected hidden disabled>Berisi Nama Tamu?</option>
                                <option value="1" {{ old('allow_guest_target')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_guest_target')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_guest_target')
                            <label class="text-danger mt-2" for="allow_guest_target">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow RSVP --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-rsvp" for="allow-rsvp">
                                RSVP <span class="text-danger">*</span>
                            </label>

                            <select id="allow-rsvp" name="allow_rsvp" class="form-select" aria-label="Allow RSVP" aria-describedby="label-allow-rsvp">
                                <option selected hidden disabled>Berisi RSVP?</option>
                                <option value="1" {{ old('allow_rsvp')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_rsvp')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_rsvp')
                            <label class="text-danger mt-2" for="allow_rsvp">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        {{-- Input Allow Gift --}}
                        <div class="mb-4 col-12 col-lg-6">
                            <label class="form-label d-block" id="label-allow-rsvp" for="allow-gift">
                                Gift <span class="text-danger">*</span>
                            </label>

                            <select id="allow-gift" name="allow_gift" class="form-select" aria-label="Allow Gift" aria-describedby="label-allow-gift">
                                <option selected hidden disabled>Berisi Gift?</option>
                                <option value="1" {{ old('allow_gift')==='1' ? 'selected' : '' }}>Iya</option>
                                <option value="0" {{ old('allow_gift')==='0' ? 'selected' : '' }}>Tidak</option>
                            </select>

                            @error('allow_gift')
                            <label class="text-danger mt-2" for="allow_gift">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            {{-- Back Button --}}
                            <a class="btn btn-light" type="submit" href="{{ route('cms.variants.index') }}">
                                Kembali
                            </a>

                            {{-- Submit Button --}}
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Custom Scripts --}}
@pushOnce('after-scripts')
{{-- Form Validation --}}
<script>
    $('form#variant-create, form#variant-edit').validate({
        rules: {
            name: {
                required: true,
            },
            price: {
                required: true,
            },
            discount_status: {
                required: true,
            },
            discount_type: {
                required: function(element) {
                    return ($("[name=discount_status]").val() == true);
                },
            },
            discount_amount: {
                required: function(element) {
                    return ($("[name=discount_status]").val() == true);
                },
            },
            allow_couple_photos: {
                required: true,
            },
            allow_galleries: {
                required: true,
            },
            allow_videos: {
                required: true,
            },
            allow_google_maps: {
                required: true,
            },
            allow_countdown: {
                required: true,
            },
            allow_backsound: {
                required: true,
            },
            allow_guest_book: {
                required: true,
            },
            allow_guest_target: {
                required: true,
            },
            allow_rsvp: {
                required: true,
            },
            allow_gift: {
                required: true,
            },
            max_galleries: {
                required: function(element) {
                    return $("[name=allow_galleries]").val() == true;
                }
            },
            max_videos: {
                required: function(element) {
                    return $("[name=allow_videos]").val() == true;
                },
            },
        },
    });
</script>

{{-- Internal Scripts --}}
<script>
    function toggleNextInput(e, selector) {
        const value = e.target.value;
        const nextInput = $(selector);

        if (value == false) {
            nextInput.prop('disabled', true);
            nextInput.val(null);
        } else {
            nextInput.prop('disabled', false);
        }
    }
</script>
@endPushOnce