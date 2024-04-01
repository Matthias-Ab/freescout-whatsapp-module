<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client; // Twilio Library

class whatsapp extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->get('message');
        $receiverNumber = $request->get('receiver_number');

        // Twilio Account SID and Auth Token
        $accountSid = config('services.twilio.sid');
        $authToken = config('services.twilio.token');

        try {
            $client = new Client($accountSid, $authToken);
            $client->messages->create(
                'whatsapp:++12673802453',
                [
                    'from' => 'whatsapp:+12673802453',
                    'body' => $message,
                    'to' => "Whatsapp:{$receiverNumber}"
                ]
            );
        } catch (\Exception $e) {
            return redirect() -> back() -> with('error', $e->getMessage());
        }
    }
}