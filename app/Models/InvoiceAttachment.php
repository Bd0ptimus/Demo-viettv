<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class InvoiceAttachment extends Model
{
    protected $table = "invoice_attachments";
    protected $fillable = [
        'url',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
