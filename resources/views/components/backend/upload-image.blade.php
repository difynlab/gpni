@props(['old_name', 'old_value', 'new_name', 'path', 'class'])

<label for="image" class="form-label">Upload Image</label>

<div class="drop-area image-drop-area {{ isset($class) ? $class : '' }}">
    <i class="bi bi-cloud-arrow-up"></i>
    <p class="drag-drop">Drag and drop files here</p>
    <div class="row line-or">
        <div class="col">
            <hr>
        </div>
        <div class="col-2 text-center">
            <p>or</p>
        </div>
        <div class="col">
            <hr>
        </div>
    </div>
    <label for="{{ $new_name }}" class="button">Browse File</label>
    <p class="condition">Maximum file size is 2 MB</p>
    <input type="file" id="{{ $new_name }}" class="image-file-element" name="{{ $new_name }}" accept="image/*" style="display:none">
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">

    <div class="image-preview">
        @if($old_value)
            <img src="{{ asset('storage/' . $path . '/' . $old_value) }}">
        @endif
    </div>
</div>