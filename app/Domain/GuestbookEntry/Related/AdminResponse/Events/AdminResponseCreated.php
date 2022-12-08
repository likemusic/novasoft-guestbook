<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse\Events;

use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminResponseCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public AdminResponse $adminResponse
    )
    {
    }

    public function broadcastOn()
    {
        return new PrivateChannel('admin_responses.' . $this->adminResponse->guestbookEntry->user_id);
    }
}
