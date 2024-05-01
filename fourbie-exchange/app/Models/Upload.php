<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    public function casts() {
        return [
            'size' => 'integer'
        ];
    }
    
    public function imageFor()
    {
        return $this->belongsTo(Listing::class, 'image_id');
    }

    public function carfaxFor()
    {
        return $this->belongsTo(Listing::class, 'carfax_id');
    }


    public static function upload($file) {
        $file_name = time().'.'. $file->extension();  
        $file->storePubliclyAs('public/uploads', $file_name);

        $upload = new Upload;

        $upload->name = $file_name;
        $upload->slug = $file_name;
        $upload->path = storage_path('public/uploads').'/'.$file_name;
        $upload->size = $file->getSize();
        $upload->mime = $file->getMimeType();
        $upload->original_name = $file->getClientOriginalName();
        $upload->url = Storage::url('public/uploads/' . $file_name);
        $upload->save();

        return $upload;
    }


    public function remove() {
        if ( Storage::exists('public/uploads/' . $this->name) ) {
            Storage::delete('public/uploads/' . $this->name);
            $this->delete();
        }
        return true;
    }
}
