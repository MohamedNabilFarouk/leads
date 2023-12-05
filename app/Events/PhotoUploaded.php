<?php
namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PhotoUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $path;

    public function __construct($path)
    {
        $this->path = $path;
        dd(1);
    }
}