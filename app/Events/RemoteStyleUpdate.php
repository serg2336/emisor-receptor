<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RemoteStyleUpdate implements ShouldBroadcast
{
    public string $newText;
    public string $newStyle;

    public function __construct(string $newText, string $newStyle)
    {
        $this->newText  = $newText;
        $this->newStyle = $newStyle;
    }

    // Canal PÚBLICO (no requiere autenticación)
    public function broadcastOn(): array
    {
        return [new Channel('style-channel')];
    }

    // Nombre del evento en el frontend (Echo lo escucha con un punto adelante)
    public function broadcastAs(): string
    {
        return 'RemoteStyleUpdate';
    }
}