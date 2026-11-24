<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>We received your message - Cardic Store</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #0f172a;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f8fafc; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #0b1c30; padding: 32px; color: #ffffff; text-align: center;">
                            <div style="display: inline-block; background-color: #0037b0; color: #85f8c4; font-size: 11px; font-weight: 800; padding: 4px 12px; border-radius: 999px; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 12px;">Support Desk</div>
                            <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #ffffff;">We Received Your Message!</h1>
                            <p style="margin: 8px 0 0 0; font-size: 13px; color: #94a3b8;">Your inquiry has been assigned to our 24/7 client operations team.</p>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding: 32px;">
                            <p style="font-size: 15px; line-height: 1.6; margin-top: 0; color: #334155;">
                                Hello <strong>{{ $contactMessage->name }}</strong>,
                            </p>
                            <p style="font-size: 14px; line-height: 1.6; color: #475569;">
                                Thank you for contacting Cardic Store. We have successfully logged your inquiry under ticket reference:
                            </p>

                            <div style="background-color: #eff4ff; border: 1px dashed #0037b0; border-radius: 12px; padding: 18px; text-align: center; margin: 24px 0;">
                                <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 1px;">Support Reference Ticket</div>
                                <div style="font-size: 20px; font-weight: 900; color: #0037b0; letter-spacing: 2px; margin-top: 4px;">{{ $contactMessage->ticket_number }}</div>
                            </div>

                            <p style="font-size: 13px; line-height: 1.6; color: #64748b;">
                                An operations specialist will review your details and respond to <strong>{{ $contactMessage->email }}</strong> typically within 120 seconds for priority requests.
                            </p>

                            <div style="background-color: #f8fafc; border-radius: 10px; padding: 16px; margin-top: 24px;">
                                <div style="font-size: 11px; font-weight: 700; color: #475569; text-transform: uppercase; margin-bottom: 6px;">Copy of your inquiry:</div>
                                <div style="font-size: 13px; color: #64748b; line-height: 1.5; font-style: italic;">"{{ $contactMessage->message }}"</div>
                            </div>

                            <div style="margin-top: 32px; text-align: center;">
                                <a href="{{ config('app.url') }}/marketplace" style="display: inline-block; background-color: #0037b0; color: #ffffff; text-decoration: none; padding: 12px 28px; font-size: 13px; font-weight: 700; border-radius: 999px;">
                                    Browse Cardic Store Catalog &rarr;
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 24px 32px; border-top: 1px solid #e2e8f0; font-size: 11px; color: #94a3b8; text-align: center;">
                            &copy; {{ date('Y') }} Cardic Store Inc. All rights reserved.<br>
                            Protected by Cardic Escrow Protocol &bull; Lilongwe, Malawi & Global Nodes
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
