<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact\Contact;

class ContactReply extends Model
{
    use HasFactory;

    protected $table = 'Contact_replies';

    protected $fillable = [
        'message',
        'contact_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the contact that owns the reply.
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
