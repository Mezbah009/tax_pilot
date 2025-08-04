@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Team Member</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('team_members.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ route('team_members.update', $teamMember->id) }}" method="POST" id="teamMemberForm" name="teamMemberForm">
            @csrf
            @method('PUT')

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $teamMember->name }}">
                                    <p class="error"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation" value="{{ $teamMember->designation }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $teamMember->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook URL" value="{{ $teamMember->facebook }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram URL" value="{{ $teamMember->instagram }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="LinkedIn URL" value="{{ $teamMember->linkedin }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter URL" value="{{ $teamMember->twitter }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="hidden" id="image_id" name="image_id" value="{{ $teamMember->image_id }}">

                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.<br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('team_members.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
    <script>
        $("#teamMemberForm").submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled',true);
            $.ajax({
                url: element.attr('action'),
                type: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("button[type=submit]").prop('disabled',false);
                    if(response.status == true){
                        window.location.href = "{{ route('team_members.index') }}";
                    } else{
                        var errors = response.errors;
                        $(".error").removeClass('is-invalid').html('');
                        $("input[type='text'], input[type='email']").removeClass('is-invalid');
                        $.each(errors, function(key, value) {
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

        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("#image", {
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });

                // Pre-fill existing image
                var existingImage = '{{ $teamMember->image ? asset('uploads/team/'.$teamMember->image) : '' }}';
                if (existingImage) {
                    var mockFile = { name: '{{ $teamMember->image }}', size: 12345 }; // Replace '12345' with actual size of the image
                    this.emit('addedfile', mockFile);
                    this.emit('thumbnail', mockFile, existingImage);
                    this.emit('complete', mockFile);
                }
            },
            success: function(file, response){
                $("#image_id").val(response.image_id);
            }
        });
    </script>
@endsection
