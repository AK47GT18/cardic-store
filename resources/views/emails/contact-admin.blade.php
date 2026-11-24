<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Customer Ticket - Cardic Store</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #0f172a;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f1f5f9; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #0037b0; padding: 28px 32px; color: #ffffff;">
                            <div style="font-size: 11px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #85f8c4; margin-bottom: 6px;">Support Desk Notification</div>
                            <h1 style="margin: 0; font-size: 22px; font-weight: 800; color: #ffffff;">New Inquiry Ticket</h1>
                        </td>
                    </tr>
                    <!-- Ticket Details -->
                    <tr>
                        <td style="padding: 32px;">
                            <table width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 24px; background-color: #eff4ff; border-radius: 12px; padding: 16px;">
                                <tr>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 700; color: #0037b0; width: 120px;">Ticket #:</td>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 800; color: #0f172a;">{{ $contactMessage->ticket_number }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 700; color: #0037b0;">Sender Name:</td>
                                    <td style="padding: 6px 12px; font-size: 13px; color: #0f172a;">{{ $contactMessage->name }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 700; color: #0037b0;">Sender Email:</td>
                                    <td style="padding: 6px 12px; font-size: 13px; color: #0f172a;"><a href="mailto:{{ $contactMessage->email }}" style="color: #0037b0; text-decoration: underline;">{{ $contactMessage->email }}</a></td>
                                </tr>
                                @if(!empty($contactMessage->phone))
                                <tr>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 700; color: #0037b0;">Phone:</td>
                                    <td style="padding: 6px 12px; font-size: 13px; color: #0f172a;">{{ $contactMessage->phone }}</td>
                                </tr>
                                @endif
                                @if(!empty($contactMessage->company))
                                <tr>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 700; color: #0037b0;">Company:</td>
                                    <td style="padding: 6px 12px; font-size: 13px; color: #0f172a;">{{ $contactMessage->company }}</td>
                                </tr>
                                @endif
                                @if(!empty($contactMessage->subject))
                                <tr>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 700; color: #0037b0;">Subject:</td>
                                    <td style="padding: 6px 12px; font-size: 13px; color: #0f172a;">{{ $contactMessage->subject }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 6px 12px; font-size: 13px; font-weight: 700; color: #0037b0;">Client IP:</td>
                                    <td style="padding: 6px 12px; font-size: 13px; color: #64748b;">{{ $contactMessage->ip_address ?? 'N/A' }}</td>
                                </tr>
                            </table>

                            <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; color: #64748b; letter-spacing: 1px; margin-bottom: 8px;">Customer Message:</div>
                            <div style="background-color: #f8fafc; border-left: 4px solid #0037b0; padding: 18px; border-radius: 8px; font-size: 14px; line-height: 1.6; color: #1e293b; white-space: pre-wrap;">{{ $contactMessage->message }}</div>

                            <div style="margin-top: 32px; text-align: center;">
                                <a href="mailto:{{ $contactMessage->email }}?subject=Re:%20[Ticket%20%23{{ $contactMessage->ticket_number }}]%20Cardic%20Store%20Support" style="display: inline-block; background-color: #0037b0; color: #ffffff; text-decoration: none; padding: 12px 28px; font-size: 13px; font-weight: 700; border-radius: 999px;">
                                    Reply to Customer &rarr;
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 20px 32px; border-top: 1px solid #e2e8f0; font-size: 11px; color: #64748b; text-align: center;">
                            Cardic Store Automated Dispatcher &bull; Instant Escrow &bull; Worldwide Gift Cards
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
