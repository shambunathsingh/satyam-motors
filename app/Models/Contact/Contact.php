<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact\ContactReply;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'Contacts';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'subject',
        'content',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the replies for the contact.
     */
    public function ContactReply()
    {
        return $this->hasMany(ContactReply::class);
    }
}
