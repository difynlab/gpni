@props(['old_name', 'old_value', 'new_name', 'path', 'class', 'label'])

@if(isset($label))
    <label for="image" class="form-label">Upload {{ $label }} Image</label>
@else
    <label for="image" class="form-label">Upload Image</label>
@endif

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
    <p class="condition">Maximum file size is 30 MB</p>
    <input type="file" id="{{ $new_name }}" class="image-file-element" name="{{ $new_name }}" accept="image/*" style="display:none">
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">
    <input type="hidden" name="delete_image" value="0" class="delete-image-input">

    <div class="image-preview right">
        @if($old_value)
            <img src="{{ asset('storage/backend/' . $path . '/' . $old_value) }}">
            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 delete-image-btn">
                <i class="bi bi-x"></i>
            </button>
        @endif
    </div>
</div>

@push('after-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteBtn = document.querySelector('.delete-image-btn');
        const deleteInput = document.querySelector('.delete-image-input');
        const imagePreview = document.querySelector('.image-preview');
        
        if (deleteBtn) {
            deleteBtn.addEventListener('click', function() {
                imagePreview.innerHTML = '';
                deleteInput.value = '1';
            });
        }
    });
</script>
@endpush