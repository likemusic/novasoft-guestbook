<?php

namespace App\Domain\GuestbookEntry\FakerProviders;

use App\Domain\Base\FakerProviders\BaseModelIdFakerProvider;
use App\Domain\GuestbookEntry\GuestbookEntry;

class GuestbookEntryIdFakerProvider extends BaseModelIdFakerProvider
{
    protected function getModelClassName(): string
    {
        return GuestbookEntry::class;
    }

    public function guestbookEntryId(): int
    {
        return $this->getNextValue();
    }
}
