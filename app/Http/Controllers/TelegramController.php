<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    private $telegramBotToken;
    private $telegramChatId;

    public function __construct()
    {
        $this->telegramBotToken = env('TELEGRAM_BOT_TOKEN'); // Load bot token from .env
        $this->telegramChatId = env('TELEGRAM_CHAT_ID');     // Load default chat ID from .env
    }

    public function sendVerificationCode(Request $request)
    {
        // Validate input
        $request->validate([
            'chat_id' => 'required|integer', // Chat ID of the user
        ]);

        // Generate a random verification code
        $verificationCode = rand(10000, 99999);

        // Send the code to Telegram
        $response = Http::post("https://api.telegram.org/bot{$this->telegramBotToken}/sendMessage", [
            'chat_id' => $request->chat_id,
            'text' => "Your verification code is: {$verificationCode}",
        ]);

        if ($response->successful()) {
            return response()->json([
                'status' => true,
                'message' => 'Verification code sent successfully!',
                'code' => $verificationCode, // Optionally return the code (for dev/testing purposes)
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to send verification code',
        ], 500);
    }
}
