<div class="mb-3">
    <!-- Carfax Upload -->
    <label for="carfax" class="form-label">Carfax</label>
    <input type="file" name="carfax" id="carfax" class="form-control" wire:model="file">

    @error('file')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    @if ($uploaded_file)
        <p>{{ $uploaded_file->original_name }}</p>
        <input type="hidden" name="carfax_upload_id" value="{{ $uploaded_file->id }}">
    @endif

    <button wire:click="submitUpload" type="button" class="btn btn-primary mt-2">Upload</button>
</div>
