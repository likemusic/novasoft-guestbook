<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse;

use App\Domain\GuestbookEntry\GuestbookEntry;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        AdminResponseTableColumnNamesConstants::CONTENT,
        AdminResponseTableColumnNamesConstants::GUESTBOOK_ENTRY_ID,
        AdminResponseTableColumnNamesConstants::USER_ID,
    ];

    public function guestbookEntry(): BelongsTo
    {
        return $this->belongsTo(GuestbookEntry::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
