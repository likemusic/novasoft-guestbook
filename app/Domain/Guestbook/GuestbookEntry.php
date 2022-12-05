<?php

namespace App\Domain\Guestbook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestbookEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        GuestbookEntryTableColumnNamesConstants::CONTENT,
    ];
}
