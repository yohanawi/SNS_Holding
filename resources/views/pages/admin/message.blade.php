@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4 text-uppercase">Messages</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Back to Dashboard</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="border-0 shadow-lg card">
            <div class="card-body">
                @if ($messages->isEmpty())
                    <div class="text-center alert alert-info">No messages found.</div>
                @else
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Received At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ Str::limit($message->content, 50) }}</td>
                                    <td>{{ $message->created_at->format('F d, Y h:i A') }}</td>
                                    <td>
                                        <a href="{{ route('admin.messages.reply', $message->id) }}"
                                            class="btn btn-sm btn-primary">Reply</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
