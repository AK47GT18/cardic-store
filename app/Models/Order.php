<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'order_id',
        'tx_ref',
        'customer_email',
        'customer_phone',
        'currency',
        'total_usd',
        'total_mwk',
        'payment_gateway',
        'payment_method',
        'payment_status',
        'fulfillment_status',
        'voucher_code',
        'reloadly_transaction_id',
        'items_payload',
        'raw_payment_response',
        'ip_address',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'total_usd' => 'decimal:2',
            'total_mwk' => 'decimal:2',
            'items_payload' => 'array',
            'raw_payment_response' => 'array',
        ];
    }
}
