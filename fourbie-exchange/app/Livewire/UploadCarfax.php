<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Upload;

class UploadCarfax extends Component
{
    use WithFileUploads;

    #[Validate('mimes:jpeg,png,jpg,gif,svg,pdf|max:2048')]
    public $file;
    public $uploaded_file;

    public function mount() {
        $session_upload_id = old('carfax_upload_id');
        $this->uploaded_file = Upload::find($session_upload_id);
    }

    public function submitUpload() {
        $uploaded_file = Upload::upload($this->file);
        if ( $this->uploaded_file ) {
            $this->uploaded_file->remove();
        }

        $this->uploaded_file = $uploaded_file;

        
    }

    public function render()
    {
        return view('livewire.upload-carfax');
    }
}
