<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscribeRequest;
use App\Mail\NewsletterWelcomeMail;
use App\Models\NewsletterSubscriber;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * Subscribe an email to VIP newsletter alerts.
     */
    public function subscribe(NewsletterSubscribeRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $email = $validated['email'];

        $subscriber = NewsletterSubscriber::firstOrCreate(
            ['email' => $email],
            [
                'ip_address' => $request->ip(),
                'user_agent' => mb_substr((string) $request->userAgent(), 0, 500),
                'status' => 'active',
            ]
        );

        $isNew = $subscriber->wasRecentlyCreated;

        if ($isNew) {
            try {
                Mail::to($subscriber->email)->send(new NewsletterWelcomeMail($subscriber));
            } catch (Exception $e) {
                Log::error('Newsletter welcome email failed: '.$e->getMessage(), [
                    'email' => $email,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'is_new' => $isNew,
            'message' => 'Thank you for subscribing! A confirmation and VIP benefits guide have been emailed to '.e($email).'.',
        ]);
    }
}
