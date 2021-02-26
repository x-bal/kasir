<?php

namespace App\Events;
use App\Barang;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateStokBarang
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $barang;

    public function __construct(Barang $barang)
    {
        $this->barang = $barang;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn($barang)
    {
        return new PrivateChannel('channel-name');
    }
}
