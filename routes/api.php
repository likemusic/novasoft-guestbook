<?php

use App\Domain\GuestbookEntry\GuestbookEntryController;
use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
], function () {
    Route::apiResource('guestbook', GuestbookEntryController::class)
        ->parameter('guestbook', 'guestbook-entry')
        ->only(['index', 'show']);

//    Route::apiResource('guestbook/{guestbook_entry}/comment', AdminResponseController::class)->only('show');

    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function () {
        Route::apiResource('guestbook', GuestbookEntryController::class)
            ->parameter('guestbook', 'guestbook_entry')
            ->only(['store', 'update', 'delete']);

        // Admin response
        Route::post('guestbook/{guestbook_entry}/comment', [AdminResponseController::class, 'store']);
        Route::match(['put', 'patch'], 'guestbook/{guestbook_entry}/comment', [AdminResponseController::class, 'update']);
        Route::delete('guestbook/{guestbook_entry}/comment', [AdminResponseController::class, 'destroy']);
    });
});
