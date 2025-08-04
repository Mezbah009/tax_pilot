@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Client Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('client_categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="{{ route('client_categories.update', $clientCategory->id) }}" method="POST" id="clientCategoryForm" name="clientCategoryForm">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Client Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $clientCategory->name }}" placeholder="Name">
                                    <p class="error"></p>
                                </div>
                            </div>

                            {{-- Slug --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" readonly name="slug" id="slug" class="form-control" value="{{ $clientCategory->slug }}" placeholder="Slug">
                                    <p class="error"></p>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="status" id="status" {{ $clientCategory->status ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('client_categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
    <script>
        // Handle form submission
        $("#clientCategoryForm").submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route('client_categories.update', $clientCategory->id) }}',
                type: 'POST',
                data: element.serializeArray(),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-HTTP-Method-Override': 'PUT'
                },
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response.status === true) {
                        window.location.href = "{{ route('client_categories.index') }}";
                    } else {
                        $(".error").removeClass('is-invalid').html('');
                        $("input[type='text'], input[type='checkbox']").removeClass('is-invalid');

                        $.each(response.errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`#${key}`).next('p').addClass('invalid-feedback').html(value);
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Something went wrong");
                }
            });
        });

        // Slug generation based on name
        $("#name").change(function() {
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('getSlug') }}',
                type: 'GET',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response.status === true) {
                        $("#slug").val(response.slug);
                    }
                }
            });
        });
    </script>
@endsection
