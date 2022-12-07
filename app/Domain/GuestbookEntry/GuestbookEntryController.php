<?php

namespace App\Domain\GuestbookEntry;

use App\Domain\Base\GetCurrentUserIdTrait;
use App\Domain\GuestbookEntry\Requests\StoreGuestbookEntryRequest;
use App\Domain\GuestbookEntry\Requests\UpdateGuestbookEntryRequest;
use App\Http\Controllers\Controller;

class GuestbookEntryController extends Controller
{
    use GetCurrentUserIdTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GuestbookEntry::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestbookEntryRequest $request)
    {
        $modelAttributes = array_merge(
            $request->toArray(),
            [
                GuestbookEntryTableColumnNamesConstants::USER_ID => $this->getCurrentUserId(),
            ]
        );

        return new GuestbookJsonResource(GuestbookEntry::create($modelAttributes));
    }

    /**
     * Display the specified resource.
     */
    public function show(GuestbookEntry $guestbookEntry)
    {
        return new GuestbookJsonResource($guestbookEntry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestbookEntryRequest $request, GuestbookEntry $guestbookEntry)
    {
        $guestbookEntry::update($request->toArray());

        return new GuestbookJsonResource($guestbookEntry);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestbookEntry $guestbookEntry)
    {
        $guestbookEntry->delete();

        return response()->noContent();
    }
}