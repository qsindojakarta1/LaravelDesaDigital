<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="judul" class="form-label">judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $profile->judul }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="content" class="form-label">content</label>
            <textarea name="content" class="content form-control" id="content" cols="30" rows="10">{{ $profile->content }}</textarea>
        </div>
    </div>
</div>
@push('script')

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endpush