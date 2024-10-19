@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4 text-uppercase">Reply to Message</h2>
            <a href="{{ route('admin.message') }}" class="btn btn-outline-secondary btn-sm">Back to Messages</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="border-0 shadow-lg card">
            <div class="card-body">
                <h4 class="mb-4">Message from {{ $message->name }}</h4>
                <p><strong>Email:</strong> {{ $message->email }}</p>
                <p><strong>Message:</strong> {{ $message->content }}</p>

                <form action="{{ route('admin.messages.sendReply', $message->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="reply_content" class="form-label">Your Reply</label>
                        <textarea name="reply_content" id="reply_content" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Reply</button>
                </form>
            </div>
        </div>
    </div>
@endsection
