<div class="container">
    <form action="{{ route('admin.Zonning.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
         <h1>Create New Zone</h1>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="name" id="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="contents">Zone description</label>
            <div id="content-sections">
                <textarea id="editor" name="description"></textarea>
            </div> 
        </div>

        <div class="form-group">
            <label for="images">Zone cover images</label>
            <input type="file" class="form-control-file" name="images[]" id="images" multiple>
        </div>

        <div class="form-group">
            <button type="submit" class="btn" style="background:#1D940F;color:white;">Create</button>
        </div>
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
