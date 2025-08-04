@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Sub-Sub Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('subsubcategories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('subsubcategories.store') }}" method="POST" id="subSubCategoryForm">
            @csrf
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sub_category_id">Sub Category</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                    @error('sub_category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Sub-Sub Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Sub-Sub Category Name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" readonly>
                                    @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('subsubcategories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('customJs')
<script>
    // Handle form submission for SubSubCategory
    $("#subSubCategoryForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: '{{ route('subsubcategories.store') }}',
            type: 'POST',
            data: element.serializeArray(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);

                if (response["status"] == true) {
                    window.location.href = "{{ route('subsubcategories.index') }}"
                } else {
                    var errors = response['errors'];
                    $(".error").removeClass('is-invalid').html('');
                    $("input[type='text'], select").removeClass('is-invalid');

                    $.each(errors, function(key, value) {
                        $(`#${key}`).addClass('is-invalid');
                        $(`#${key}`).next('p').addClass('invalid-feedback').html(value);
                    });
                }
            },
            error: function(jqXHR, exception) {
                console.log("Something went wrong");
            }
        })
    });

    // Slug generation based on name for SubSubCategory
    $("#name").change(function() {
        element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route('getSlug') }}',
            type: 'get',
            data: {
                title: element.val()
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) {
                    $("#slug").val(response["slug"])
                }
            }
        });
    });

    // Fetch SubCategories based on selected Category for SubSubCategory
    $('#category_id').change(function () {
        let categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: '{{ route('subcategories.getSubCategories') }}', // The route that fetches subcategories for a category
                type: 'GET',
                data: { category_id: categoryId },
                success: function (response) {
                    if (response.status) {
                        let options = '<option value="">Select Sub Category</option>';
                        $.each(response.subCategories, function (key, subCategory) {
                            options += `<option value="${subCategory.id}">${subCategory.name}</option>`;
                        });
                        $('#sub_category_id').html(options); // Populate subcategories dropdown
                    }
                }
            });
        } else {
            $('#sub_category_id').html('<option value="">Select Sub Category</option>');
        }
    });
</script>

@endsection

