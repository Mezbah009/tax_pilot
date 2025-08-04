@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Newsletter Subscriptions</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.newsletter.export') }}" class="btn btn-primary">Export to Excel</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Subscribed At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $loop->iteration + ($subscriptions->currentPage() - 1) * $subscriptions->perPage() }}
                                    </td>
                                    <td>{{ $subscription->email }}</td>
                                    <td>{{ $subscription->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <form action="{{ route('admin.newsletter.destroy', $subscription->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this subscription?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No subscriptions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $subscriptions->links() }}
                </div>

            </div>
        </div>
    </section>
@endsection
