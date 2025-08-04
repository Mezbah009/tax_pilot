@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Website Settings</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <form method="POST" id="settingForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Site Title -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="site_title">Site Title</label>
                                <input type="text" name="site_title" id="site_title" class="form-control"
                                       value="{{ $setting->site_title }}" placeholder="Site Title">
                                <p class="error"></p>
                            </div>
                        </div>

                        <!-- Meta Keywords -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                       value="{{ $setting->meta_keywords }}" placeholder="Meta Keywords">
                                <p class="error"></p>
                            </div>
                        </div>

                        <!-- Meta Description -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" rows="4" class="form-control"
                                          placeholder="Meta Description">{{ $setting->meta_description }}</textarea>
                                <p class="error"></p>
                            </div>
                        </div>

                        <!-- Copyright -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="copyright_text">Copyright Text</label>
                                <input type="text" name="copyright_text" id="copyright_text"
                                       value="{{ $setting->copyright_text }}"
                                       class="form-control" placeholder="© 2025 Company Name. All rights reserved.">
                                <p class="error"></p>
                            </div>
                        </div>

                        <!-- Logo Upload -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="logo">Logo</label>
                                @if($setting->logo)
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/logo/' . $setting->logo) }}" width="100" alt="Current Logo">
                                    </div>
                                @endif
                                <input type="hidden" id="logo_image_id" name="logo_image_id">
                                <div id="logo" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">Drop logo here or click to upload.</div>
                                </div>
                                <p class="error"></p>
                            </div>
                        </div>

                        <!-- Favicon Upload -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="favicon">Favicon</label>
                                @if($setting->favicon)
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/favicon/' . $setting->favicon) }}" width="32" alt="Current Favicon">
                                    </div>
                                @endif
                                <input type="hidden" id="favicon_image_id" name="favicon_image_id">
                                <div id="favicon" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">Drop favicon here or click to upload.</div>
                                </div>
                                <p class="error"></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update Settings</button>
            </div>
        </div>
    </form>
</section>
@endsection

@section('customJs')
<script>
    $("#settingForm").submit(function (event) {
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: "{{ route('site-settings.update', $setting->id) }}",
            type: 'POST',
            data: element.serializeArray(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("button[type=submit]").prop('disabled', false);
                if (response.status === true) {
                    alert(response.message);
                    window.location.href = "{{ route('site-settings.index') }}";
                } else {
                    $(".error").html('').removeClass('is-invalid');
                    $.each(response.errors, function (key, val) {
                        $(`#${key}`).addClass('is-invalid');
                        $(`#${key}`).next('.error').addClass('invalid-feedback').html(val[0]);
                    });
                }
            },
            error: function () {
                $("button[type=submit]").prop('disabled', false);
                alert("Something went wrong!");
            }
        });
    });

    Dropzone.autoDiscover = false;

    $("#logo").dropzone({
        url: "{{ route('temp-images.create') }}",
        maxFiles: 1,
        paramName: 'image',
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (file, response) {
            $("#logo_image_id").val(response.image_id);
        }
    });

    $("#favicon").dropzone({
        url: "{{ route('temp-images.create') }}",
        maxFiles: 1,
        paramName: 'image',
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (file, response) {
            $("#favicon_image_id").val(response.image_id);
        }
    });
</script>
@endsection
