@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Website Settings</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('site-settings.create') }}" class="btn btn-primary">Add Settings</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @include('admin.message')

        <div class="card">
            <form action="" method="GET">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" onclick="window.location.href='{{ route('categories.index') }}'"
                            class="btn btn-default btn-sm">Reset</button>
                    </div>
                    <div class="card-tools">
                        <div class="input-group" style="width: 250px;">
                            <input type="text" name="keyword" value="{{ Request::get('keyword') }}"
                                class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Settings Table --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Site Title</th>
                            <th>Logo</th>
                            <th>Favicon</th>
                            <th>Meta Description</th>
                            <th>Copyright</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($settings as $setting)
                            <tr>
                                <td>{{ $setting->id }}</td>
                                <td>{{ $setting->site_title }}</td>
                                <td>
                                    @if($setting->logo)
                                        <img src="{{ asset('uploads/logo/' . $setting->logo) }}" width="60" alt="Logo">
                                    @endif
                                </td>
                                <td>
                                    @if($setting->favicon)
                                        <img src="{{ asset('uploads/favicon/' . $setting->favicon) }}" width="30" alt="Favicon">
                                    @endif
                                </td>
                                <td>{{ Str::limit($setting->meta_description, 50) }}</td>
                                <td>{{ $setting->copyright_text }}</td>
                                <td>
                                    <a href="{{ route('site-settings.edit', $setting->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('site-settings.destroy', $setting->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure to delete this setting?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No settings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $settings->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
