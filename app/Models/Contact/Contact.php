<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact\ContactReply;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'form_enquiry';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'content',
    ];

    /**
     * Get the replies for the contact.
     */
    public function ContactReply()
    {
        return $this->hasMany(ContactReply::class);
    }
}
