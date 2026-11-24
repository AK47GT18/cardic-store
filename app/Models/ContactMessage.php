<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'ticket_number',
        'name',
        'email',
        'company',
        'phone',
        'subject',
        'message',
        'ip_address',
        'status',
    ];
}
