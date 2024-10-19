<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('pages.admin.message', compact('messages'));
    }

    public function reply($id)
    {
        $message = Message::findOrFail($id);
        return view('pages.admin.messages.reply', compact('message'));
    }

    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'reply_content' => 'required|string',
        ]);

        $message = Message::findOrFail($id);

        Mail::raw($request->reply_content, function ($mail) use ($message) {
            $mail->to($message->email)
                ->subject('Reply to Your Message');
        });

        return redirect()->route('admin.messages')->with('success', 'Reply sent successfully!');
    }
}
