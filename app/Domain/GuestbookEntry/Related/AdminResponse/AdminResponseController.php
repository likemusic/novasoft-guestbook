<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse;

use App\Domain\Base\Controllers\Controller;
use App\Domain\Base\GetCurrentUserIdTrait;
use App\Domain\GuestbookEntry\GuestbookEntry;
use App\Domain\GuestbookEntry\Related\AdminResponse\Requests\StoreAdminResponseRequest;
use App\Domain\GuestbookEntry\Related\AdminResponse\Requests\UpdateAdminResponseRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;

class AdminResponseController extends Controller
{
    use GetCurrentUserIdTrait;

    public function store(GuestbookEntry $guestbookEntry, StoreAdminResponseRequest $request)
    {
        $this->authorize('create', AdminResponse::class);

        if ($guestbookEntry->adminResponse) {
            throw ValidationException::withMessages([
                'guestbook_entry_id' => "Admin response for Guestbook entry with id {$guestbookEntry->getKey()} already exists. Delete exists comment before create the new one or update exists instead."
            ]);
        }

        $attributes = array_merge(
            $request->all(),
            [
                AdminResponseTableColumnNamesConstants::USER_ID => $this->getCurrentUserId(),
            ]
        );

        return new JsonResource($guestbookEntry->adminResponse()->create($attributes));
    }

    public function show(GuestbookEntry $guestbookEntry)
    {
        $adminResponse = $guestbookEntry->adminResponse;

        $this->authorize('view', $guestbookEntry->adminResponse);

        return new JsonResource($adminResponse);
    }

    public function update(UpdateAdminResponseRequest $request, GuestbookEntry $guestbookEntry)
    {
        $this->authorize('update', $guestbookEntry->adminResponse);

        if (!$adminResponse = $guestbookEntry->adminResponse) {
            throw ValidationException::withMessages([
                'guestbook_entry_id' => "Admin response for Guestbook entry with id {$guestbookEntry->getKey()} doesn't exists. You must create the new one before update."
            ]);
        }

        $adminResponse->fill($request->all())->saveOrFail();

        return new JsonResource($adminResponse);
    }

    public function destroy(GuestbookEntry $guestbookEntry)
    {
        $this->authorize('delete', $guestbookEntry->adminResponse);

        if (!$guestbookEntry->adminResponse) {
            throw ValidationException::withMessages([
                'guestbook_entry_id' => "Admin Response for Guestbook Entry with id {$guestbookEntry->getKey()} doesn't exists."
            ]);
        }

        $guestbookEntry->adminResponse->delete();

        return response()->noContent();
    }
}
