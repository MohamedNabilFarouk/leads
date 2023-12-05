<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UploadPhoto extends Component
{
    public $photo;
    use WithFileUploads;

    public function uploadPhoto()
    {
        $validatedData = $this->validate([
            'photo' => 'required', // validate the file is an image and not larger than 2MB
        ]);


        $filename = time() . '.' . $this->photo->getClientOriginalExtension();
        $path = 'photos';

        Storage::disk('public')->putFileAs($path, $this->photo, $filename);
        // save the file path to the database or do something else with it
        dd('done');

        session()->flash('message', 'Photo uploaded successfully.');
    }
    public function render()
    {
        return view('livewire.upload-photo')->layout('livewire.layouts.front');
    }
}
