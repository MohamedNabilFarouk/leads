<?php
namespace App\Listeners;

use App\Events\PhotoUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessPhotoUpload implements ShouldQueue
{
    public function handle(PhotoUploaded $event)
    {
        // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database
    }
}