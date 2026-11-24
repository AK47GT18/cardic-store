<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmitRequest;
use App\Mail\ContactMessageAdminMail;
use App\Mail\ContactMessageReceiptMail;
use App\Models\ContactMessage;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle incoming contact message submission with validation, sanitization, persistence & dual email alerts.
     */
    public function submit(ContactSubmitRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $ticketNumber = 'TKT-'.strtoupper(Str::random(6));

        $contactMessage = ContactMessage::create([
            'ticket_number' => $ticketNumber,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'company' => $validated['company'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'status' => 'received',
        ]);

        $adminEmail = config('services.admin.email', 'websmtp47@gmail.com');

        // Dispatch email alerts
        try {
            // 1. Alert Admin / Support Desk
            Mail::to($adminEmail)->send(new ContactMessageAdminMail($contactMessage));

            // 2. Auto-responder receipt to customer
            Mail::to($contactMessage->email)->send(new ContactMessageReceiptMail($contactMessage));
        } catch (Exception $e) {
            Log::error('Contact form email delivery error: '.$e->getMessage(), [
                'ticket' => $ticketNumber,
            ]);
        }

        return response()->json([
            'success' => true,
            'ticket_number' => $ticketNumber,
            'message' => 'Thank you, '.e($validated['name']).'! Your inquiry [Ticket #'.$ticketNumber.'] has been dispatched to our priority 24/7 support desk. A confirmation receipt has been sent to '.e($validated['email']).'.',
        ]);
    }
}
