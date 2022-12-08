<?php

namespace App\Domain\GuestbookEntry;

use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $content
 * @property int $user_id
 * @property User $user
 * @property ?AdminResponse $adminResponse
 */
class GuestbookEntry extends Model
{
    use HasFactory;

    const PERMISSION_NAME = 'guestbook-entry';

    protected $fillable = [
        GuestbookEntryTableColumnNamesConstants::CONTENT,
        GuestbookEntryTableColumnNamesConstants::USER_ID,
    ];

    protected $with = [
        'adminResponse'
    ];

    public function adminResponse(): HasOne
    {
        return $this->hasOne(AdminResponse::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
