<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Upload;
use Livewire\WithFileUploads;

class GallerySelect extends Component
{

    use WithFileUploads;
    public $files;
    public $new_file;

    public function mount()
    {
        $session_photo_ids = old('photo_id', []);
        $this->files = Upload::whereIn('id', $session_photo_ids)->get();
    }

    public function addFile()
    {
        $uploaded_file = Upload::upload($this->new_file);
        $this->files->push($uploaded_file);
        $this->new_file = null;
    }

    public function removeFile($index)
    {
        $file = $this->files->pull($index);
        $file->remove();
    }

    public function render()
    {
        return view('livewire.gallery-select');
    }
}
