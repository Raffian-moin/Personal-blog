<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title</label>
                    {{ Form::text('title', null, ['class' => 'form-control form-control-sm' . ($errors->has('title') ? 'border-danger' : '')]) }}
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Category</label>
                    {{ Form::select('category_id', $category, null,  ['class' => 'form-control', 'placeholder' => 'Select an option']) }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Tags</label>
                    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'multiple' => 'multiple']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="custom-file mb-1">
                        <input name="cover_image" type="file" class="custom-file-input" id="fileInput">
                        <label class="custom-file-label" for="fileInput">Choose file</label>
                    </div>
                    <img id="previewImage" src="{{ isset($post) ? asset($post->cover_image) : '#' }}" alt="Preview Image" style="display: {{ isset($post) ? 'block' : 'none' }};">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                 <div class="form-group">
                    {{ Form::textarea('body', null, ['cols' => 30, 'rows' => 10, 'id' => 'easy-mde-text-editor']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::checkbox('is_published', 1) }}
                    <label class="form-check-label" for="flexCheckDefault">
                        Publish
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@push('scripts')

<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
<script src="{{ asset('admin/js/easymde.js') }}"></script>
<script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

<script>
    const fileInput = document.getElementById('fileInput');
    const previewImage = document.getElementById('previewImage');

    fileInput.addEventListener('change', function() {
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(event) {
        previewImage.src = event.target.result;
        previewImage.style.display = 'block';
        };

        reader.readAsDataURL(file);
    } else {
        previewImage.src = '#';
        previewImage.style.display = 'none';
    }
});

</script>

@endpush

