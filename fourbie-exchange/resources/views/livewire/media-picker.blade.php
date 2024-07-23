<div>
    <div>
        <button wire:click="openDialog" type="button" data-bs-toggle="modal" data-bs-target="#{{ $id }}" class="btn btn-primary mb-3">Select Media</button>

        <div class="row draggable-container">
            @foreach($confirmed as $file)
            <div class="col-auto draggable-container__item" draggable="true">
                @if ( $file->isPDF() )
                    <div class="d-flex flex-column align-items-center justify-content-around border" style="height: 100px; width: 100px;">
                        <i class="bi bi-filetype-pdf text-danger" style="font-size: 40px;"></i>
                        <p class="mb-0" style="font-size: 11px;">{{ $file->original_name }}</p>
                    </div>
                @else
                    <img src="{{ $file->url }}" alt="" class="border" height="100">
                @endif
                <input type="hidden" name="{{ $inputName }}{{ $multiple ? '[]' : '' }}" value="{{ $file->id }}" />
            </div>
            @endforeach
        </div>
    </div>
    <div>      
        <div
        @class(['modal fade' => true, 'show' => $open])
        tabindex="-1" id="{{ $id }}" @if(!$open) aria-hidden="true" @else aria-modal="true" role="dialog" style="display:block" @endif>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select &amp; Upload Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="row mb-3">
                                    <h6>Filter Media</h6>
                                    <div class="col-4">
                                        <input type="text" wire:model.live="search" class="form-control" placeholder="Search...">
                                    </div>
                                    <div class="col-4">
                                        <select wire:model.live="fileType" class="form-select">
                                            <option value="">All Types</option>
                                            <option value="image">Images</option>
                                            <option value="video">Videos</option>
                                            <option value="documents">Documents</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select wire:model.live="sortBy" class="form-select">
                                            <option value="created_at_desc">Newest First</option>
                                            <option value="created_at_asc">Oldest First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($uploads as $upload)
                                    <div class="col-auto mb-3">
                                        @if ( $upload->isPDF() )
                                            <div @class([
                                                'd-flex flex-column align-items-center justify-content-around border' => true,
                                                'border-primary border-5' => $selected->contains('id', $upload->id)
                                            ]) style="height: 200px; width: 200px;"
                                            wire:click="toggleUpload({{$upload}})">
                                                <i class="bi bi-filetype-pdf text-danger" style="font-size: 70px;"></i>
                                                <p class="mb-0">{{ $upload->original_name }}</p>
                                            </div>
                                        @else
                                        <img src="{{ $upload->url }}"
                                        @class([
                                            'border' => true,
                                            'border-primary border-5' => $selected->contains('id', $upload->id)
                                        ])
                                        alt=""
                                        height="200"
                                        wire:click="toggleUpload({{$upload}})">
                                        @endif
                                    </div>
                                    @endforeach

                                    @if ( ! $uploads->count() )
                                    <div class="col">
                                        <p>No media found.</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-5">
                                    <h3>Upload File</h3>
                                    <input type="file" wire:model="media_to_upload" class="form-control">
                                    @error('media_to_upload')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="button" wire:click="uploadFile" class="btn btn-primary mt-3">Upload</button>
                                </div>

                                <div class="mb-5">
                                    <h3>Selected File(s)</h3>
                                    @if($selected->count())
                                        <ul class="list-group">
                                            @foreach($selected as $file)
                                            <li class="list-group-item">
                                                {{ $file->original_name }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No media selected</p>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetAndClose">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="confirm">Confirm &amp; Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
