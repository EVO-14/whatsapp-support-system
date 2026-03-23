<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\Conversation;
use App\Models\Message;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return response()->json([
        'message' => 'API funcionando!'
    ]);
});

Route::get('/test-db', function () {
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
});
