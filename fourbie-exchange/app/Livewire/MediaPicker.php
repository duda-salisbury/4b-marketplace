<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Upload;
use Illuminate\Database\Eloquent\Collection;

class MediaPicker extends Component
{
    use WithFileUploads, WithPagination;

    public $multiple = false;
    public $inputName;
    public $selected;
    public $confirmed;
    public $media_to_upload;
    public $open = false;
    public $id;
    public $loadedUploads;
    public $search;
    public $fileType;
    public $sortBy = 'created_at_desc';

    public function mount($inputName, $id, $multiple = false) {
        $this->inputName = $inputName;
        $this->id = $id;
        $this->multiple = $multiple;
        $preloaded_uploads = collect(old($inputName, []));
        $this->loadedUploads = Upload::whereIn('id', $preloaded_uploads)->orderBy('created_at', 'desc')->get();
        $this->selected = $this->loadedUploads;
        $this->confirmed = $this->loadedUploads;
    }

    public function openDialog() {
        $this->selected = $this->confirmed;
        $this->open = true;
    }

    public function closeDialog() {
        $this->open = false;
    }

    public function toggleUpload(Upload $upload) {
        if ( $this->selected->contains($upload) ) {
            $this->selected = $this->selected->filter(function($item) use ($upload) {
                return $item->id !== $upload->id;
            });
        } else {
            if ( $this->multiple ) {
                $this->selected->push($upload);
            } else {
                $this->selected = collect([$upload]);
            }
        }
    }

    public function confirm() {
        $this->confirmed = $this->selected;
        $this->closeDialog();
    }

    public function resetAndClose() {
        $this->selected = collect();
        $this->closeDialog();
    }

    public function uploadFile() {
        $this->validate([
            'media_to_upload' => 'required|file|max:10240'
        ]);

        $upload = Upload::upload($this->media_to_upload);
        $this->loadedUploads->prepend($upload);
        $this->selected->push($upload);
        $this->media_to_upload = null;
    }

    public function render()
    {
        $uploads = Upload::whereNotIn('id', $this->loadedUploads->pluck('id'));

        if ( $this->search ) {
            $uploads = $uploads->where('original_name', 'like', '%'.$this->search.'%');
        }

        if ( $this->fileType ) {
            switch($this->fileType) {
                case 'image':
                    $uploads = $uploads->where('mime', 'like', 'image%');
                    break;
                case 'video':
                    $uploads = $uploads->where('mime', 'like', 'video%');
                    break;
                case 'documents':
                    $uploads = $uploads->where('mime', 'like', 'application%');
                    break;
            }
        }

        if ( $this->sortBy ) {
            switch($this->sortBy) {
                case 'created_at_asc':
                    $uploads = $uploads->orderBy('created_at', 'asc');
                    break;
                default:
                    $uploads = $uploads->orderBy('created_at', 'desc');
                    break;
            }
        }

        $uploads = $uploads->paginate(50);
        $this->loadedUploads->each(function($upload) use ($uploads) {
            $uploads->prepend($upload);
        });
        return view('livewire.media-picker', compact('uploads'));
    }
}
