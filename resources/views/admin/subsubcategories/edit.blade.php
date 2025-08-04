@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Sub-Sub Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('subsubcategories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form method="POST" id="subSubCategoryForm" action="{{ route('subsubcategories.update', $subsubcategory->id) }}">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Category -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $subsubcategory->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger" id="category_id_error"></p>
                                </div>
                            </div>

                            <!-- Sub Category -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sub_category_id">Sub Category</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                                        <option value="">Select Sub Category</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subsubcategory->sub_category_id == $subcategory->id ? 'selected' : '' }}>
                                                {{ $subcategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger" id="sub_category_id_error"></p>
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Sub-Sub Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $subsubcategory->name }}">
                                    <p class="text-danger" id="name_error"></p>
                                </div>
                            </div>

                            <!-- Slug -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $subsubcategory->slug }}" readonly>
                                    <p class="text-danger" id="slug_error"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('subsubcategories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
<script>
    // AJAX form submission
    $("#subSubCategoryForm").submit(function(event) {
        event.preventDefault();
        var form = $(this);
        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serializeArray(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);

                if (response["status"] === true) {
                    window.location.href = "{{ route('subsubcategories.index') }}";
                } else {
                    let errors = response.errors;
                    $(".text-danger").html('');
                    $("input, select").removeClass('is-invalid');

                    $.each(errors, function(key, message) {
                        $(`#${key}`).addClass('is-invalid');
                        $(`#${key}_error`).html(message);
                    });
                }
            },
            error: function() {
                $("button[type=submit]").prop('disabled', false);
                alert("Something went wrong");
            }
        });
    });

    // Auto-generate slug from name
    $("#name").change(function() {
        let nameVal = $(this).val();
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route('getSlug') }}',
            type: 'GET',
            data: { title: nameVal },
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response.status) {
                    $('#slug').val(response.slug);
                }
            }
        });
    });

    // Load subcategories dynamically on category change
    $('#category_id').change(function () {
        let categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: '{{ route('subcategories.getSubCategories') }}',
                type: 'GET',
                data: { category_id: categoryId },
                success: function (response) {
                    if (response.status) {
                        let options = '<option value="">Select Sub Category</option>';
                        $.each(response.subCategories, function (i, item) {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#sub_category_id').html(options);
                    }
                }
            });
        } else {
            $('#sub_category_id').html('<option value="">Select Sub Category</option>');
        }
    });
</script>
@endsection
