<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Cardic Store Order & Gift Card Key</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #0f172a;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f1f5f9; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width: 620px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #0b1c30; padding: 32px 36px; color: #ffffff;">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <div style="font-size: 11px; font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; color: #85f8c4; margin-bottom: 6px;">Escrow Settlement Confirmed</div>
                                        <h1 style="margin: 0; font-size: 24px; font-weight: 900; color: #ffffff;">Order {{ $order->order_id }}</h1>
                                    </td>
                                    <td align="right" style="vertical-align: top;">
                                        <div style="background-color: rgba(37, 99, 235, 0.25); border: 1px solid rgba(255, 255, 255, 0.2); padding: 4px 12px; border-radius: 999px; font-size: 11px; font-weight: 800; color: #93c5fd; text-transform: uppercase;">
                                            Verified Stock
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Voucher Claim Box -->
                    <tr>
                        <td style="padding: 32px 36px 20px 36px;">
                            <div style="background: linear-gradient(135deg, #eff4ff 0%, #e0e7ff 100%); border: 2px dashed #2563eb; border-radius: 14px; padding: 24px; text-align: center;">
                                <div style="font-size: 11px; font-weight: 800; color: #1e40af; text-transform: uppercase; letter-spacing: 1.5px;">Your Cryptographic Claim Code</div>
                                <div style="font-size: 24px; font-weight: 900; letter-spacing: 2px; color: #0037b0; font-family: monospace; margin: 12px 0; padding: 8px 16px; background-color: #ffffff; border-radius: 8px; display: inline-block; box-shadow: inset 0 2px 4px rgba(0,0,0,0.06);">
                                    {{ $order->voucher_code ?? 'CRDC-PENDING-ESCROW' }}
                                </div>
                                <div style="font-size: 12px; color: #4b5563;">
                                    🔒 Cryptographically secured &bull; 100% balance warranty &bull; Ready for instant redemption
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Order Items & Totals -->
                    <tr>
                        <td style="padding: 10px 36px 28px 36px;">
                            <div style="font-size: 12px; font-weight: 800; text-transform: uppercase; color: #64748b; letter-spacing: 1px; margin-bottom: 12px;">Order Summary</div>

                            <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; margin-bottom: 20px;">
                                @php
                                    $items = is_array($order->items_payload) ? $order->items_payload : [];
                                @endphp
                                @foreach($items as $item)
                                    <tr style="border-bottom: 1px solid #f1f5f9;">
                                        <td style="padding: 12px 0;">
                                            <div style="font-weight: 800; font-size: 14px; color: #0f172a;">{{ $item['name'] ?? ($item['brand'] ?? 'Gift Card') }}</div>
                                            <div style="font-size: 12px; color: #64748b;">Denomination: ${{ number_format($item['denom'] ?? $item['price'], 2) }} &times; {{ $item['quantity'] ?? 1 }}</div>
                                        </td>
                                        <td align="right" style="padding: 12px 0; font-weight: 800; font-size: 14px; color: #0f172a;">
                                            ${{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            <table width="100%" cellspacing="0" cellpadding="0" style="background-color: #f8fafc; border-radius: 10px; padding: 16px;">
                                <tr>
                                    <td style="font-size: 13px; color: #64748b; padding-bottom: 6px;">Total in USD:</td>
                                    <td align="right" style="font-size: 14px; font-weight: 800; color: #0f172a; padding-bottom: 6px;">${{ number_format($order->total_usd, 2) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 13px; color: #64748b; padding-bottom: 6px;">Settlement in MWK:</td>
                                    <td align="right" style="font-size: 15px; font-weight: 900; color: #0037b0; padding-bottom: 6px;">MK {{ number_format($order->total_mwk, 0) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 13px; color: #64748b;">Payment Method:</td>
                                    <td align="right" style="font-size: 13px; font-weight: 700; color: #0f172a; text-transform: uppercase;">{{ $order->payment_method }}</td>
                                </tr>
                            </table>

                            <!-- Redemption Guide -->
                            <div style="margin-top: 24px; padding: 16px; background-color: #f0fdf4; border-radius: 10px; border-left: 4px solid #16a34a;">
                                <div style="font-weight: 800; font-size: 13px; color: #166534; margin-bottom: 4px;">How to Redeem:</div>
                                <div style="font-size: 12px; color: #334155; line-height: 1.5;">
                                    Copy the claim code above and paste it on the brand's official redemption page (e.g. Amazon.com/redeem, Steam Wallet, App Store, or PlayStation Store). Your funds will be credited immediately.
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 24px 36px; border-top: 1px solid #e2e8f0; font-size: 11px; color: #94a3b8; text-align: center;">
                            Need help? Contact our 24/7 Priority Desk at <a href="mailto:support@cardicstore.com" style="color: #0037b0; text-decoration: underline;">support@cardicstore.com</a>.<br>
                            &copy; {{ date('Y') }} Cardic Store Inc. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
