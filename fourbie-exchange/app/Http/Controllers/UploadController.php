<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{
    public function upload(Request $request) {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $file_name = time().'.'. $request->file->extension();  
        $request->file->move(public_path('uploads'), $file_name);

        $upload = new Upload;

        $upload->name = $file_name;
        $upload->slug = $file_name;
        $upload->path = public_path('uploads').'/'.$file_name;
        $upload->size = $request->file->getSize();
        $upload->mime = $request->file->getMimeType();
        $upload->original_name = $request->file->getClientOriginalName();
        $upload->url = url('uploads').'/'.$file_name;

        return response()->json(['success'=>'You have successfully uploaded an image.']);
    }
}
