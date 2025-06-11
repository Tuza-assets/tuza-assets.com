<html lang="en">
@include('layouts.dashboard.head')

<body>
      <x-banner />
       <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.dashboard.toopbar')
        @include('layouts.dashboard.aside')
        <div class="page-wrapper">
            @yield('content')
        </div>
        </div>
    <!-- Bootstrap 4 JS & jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- TinyMCE Initialization -->
    <script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    tinymce.init({
        selector: '#content', // Applies TinyMCE to the textarea with ID "content"
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste',
            'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 
            'typography', 'inlinecss', 'markdown', 'textcolor', 'colorpicker' // Added textcolor and colorpicker plugins
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | forecolor backcolor', // Added forecolor and backcolor
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        // Enable file uploads for images and videos
        images_upload_url: '/your-image-upload-endpoint', // Replace with your server-side upload handler
        images_upload_base_path: '/some/basepath', // Replace with your base path for images
        images_upload_credentials: true, // Enable credentials for image uploads
        automatic_uploads: true,
        file_picker_types: 'file image media',
        // File picker callback
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            if (meta.filetype == 'image') {
                input.setAttribute('accept', 'image/*');
            }
            if (meta.filetype == 'media') {
                input.setAttribute('accept', 'video/*');
            }
            
            input.onchange = function () {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };
            
            input.click();
        },
        // Sync content with the hidden textarea on form submission
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave(); // Sync TinyMCE content with the textarea
            });
        }
    });
    // Ensure TinyMCE syncs content before form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        tinymce.triggerSave();
    });
});
    </script>
</body>
</html>