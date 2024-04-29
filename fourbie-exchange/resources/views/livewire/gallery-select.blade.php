<div>
    <label for="photos" class="form-label">Photo Gallery</label>
    <input type="file" name="photo" id="photos" class="form-control" wire:model="new_file">

    @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="button" wire:click="addFile">Upload</button>

    <div class="row mt-4">
        @foreach($files as $i => $file)
        <div class="col-md-3">
            <img src="{{ $file->url }}" alt="" class="img-fluid">
            <p>{{ $file->name }}</p>
            <input type="hidden" name="photo_id[]" value="{{ $file->id }}">
            <button type="button" wire:click="removeFile({{ $i }})">Remove</button>
        </div>
        @endforeach
    </div>
</div>
