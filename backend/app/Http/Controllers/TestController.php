<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return response()->json([
            'message' => 'API funcionando!'
        ]);
    }

    public function testDb()
    {
        $contact = Contact::create([
            'name' => 'Eduardo',
            'phone' => '44999999999',
            'profile_picture' => null
        ]);

        $conversation = Conversation::create([
            'contact_id' => $contact->id,
            'status' => 'open'
        ]);

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_type' => 'customer',
            'content' => 'Olá, preciso de atendimento.',
            'message_type' => 'text',
            'external_id' => null,
            'sent_at' => now()
        ]);

        return response()->json([
            'contact' => $contact,
            'conversation' => $conversation,
            'message' => $message
        ]);
    }

    public function testRead()
    {
        $contact = Contact::with('conversations.messages')->find(1);

        return response()->json($contact);
    }
}
