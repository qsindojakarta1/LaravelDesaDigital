<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="judul" class="form-label">judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $page->judul }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="content" class="form-label">content</label>
            <textarea name="content" class="content form-control" id="content" cols="30" rows="10">{{ $page->content }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="tag_id" class="form-label">tag id</label>
            <select name="tag_id" class="form-control" id="tag_id">
                @foreach ($tags as $tag)
                    <option @if($tag->id == $page->tag_id) selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@push('script')

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endpush