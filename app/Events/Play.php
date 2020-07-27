<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Play
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $gameId;
    public $type;
    public $location;
    public $userId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($gameId, $type, $location, $userId)
    {
        $this->gameId = $gameId;
        $this->type = $type;
        $this->location = $location;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('game-channel-' . $this->gameId . '-' . $this->userId);
    }
}
