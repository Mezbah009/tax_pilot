@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Form Messages</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.contact.export') }}" class="btn btn-primary">Export to Excel</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- Alpine root wrapper -->
        <div class="container-fluid" x-data="{ showModal: false, selectedMessage: null }">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Company Name</th>
                                <th class="px-4 py-2">Employee Count</th>
                                <th class="px-4 py-2">Message</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $message->name }}</td>
                                    <td class="px-4 py-2">{{ $message->email }}</td>
                                    <td class="px-4 py-2">{{ $message->phone }}</td>
                                    <td class="px-4 py-2">{{ $message->company_name }}</td>
                                    <td class="px-4 py-2">{{ $message->employee_count }}</td>
                                    <td class="px-4 py-2">{{ Str::limit($message->message, 50) }}</td>
                                    <td class="px-4 py-2">
                                        <div class="d-flex gap-2">
                                            <!-- Show Button -->

                                            <button class="btn btn-sm btn-info"
                                                @click="
                                                    selectedMessage = {
                                                        name: '{{ addslashes($message->name) }}',
                                                        email: '{{ addslashes($message->email) }}',
                                                        phone: '{{ addslashes($message->phone) }}',
                                                        company_name: '{{ addslashes($message->company_name) }}',
                                                        employee_count: '{{ addslashes($message->employee_count) }}',
                                                        message: `{{ addslashes($message->message) }}`
                                                    };
                                                    showModal = true
                                                "
                                                style="margin-right: 5px;">
                                                Show
                                            </button>

                                            <!-- Delete Form -->
                                            <form action="{{ route('admin.contact.destroy', $message->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this message?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="px-3 py-2">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div x-show="showModal" x-transition
                class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative" @click.away="showModal = false"
                    style="padding: 20px;">
                    <h2 class="text-xl font-semibold mb-4">Contact Message Details</h2>

                    <template x-if="selectedMessage">
                        <div class="space-y-2">
                            <p><strong>Name:</strong> <span x-text="selectedMessage.name"></span></p>
                            <p><strong>Email:</strong> <span x-text="selectedMessage.email"></span></p>
                            <p><strong>Phone:</strong> <span x-text="selectedMessage.phone"></span></p>
                            <p><strong>Company Name:</strong> <span x-text="selectedMessage.company_name"></span></p>
                            <p><strong>Employee Count:</strong> <span x-text="selectedMessage.employee_count"></span></p>
                            <p><strong>Message:</strong></p>
                            <p x-text="selectedMessage.message" class="whitespace-pre-line bg-gray-100 p-2 rounded"></p>
                        </div>
                    </template>

                    <div class="mt-4 text-right">
                        <button class="btn btn-secondary" @click="showModal = false">Close</button>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <!-- Include Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
