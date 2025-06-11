@props(['disabled' => false, 'height' => 'h-48'])

<!-- Include necessary libraries -->
<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div 
    x-data="{ editor: null }" 
    x-init="
        editor = new Quill($refs.editor, {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],       // Basic text formatting
                    [{ 'header': [1, 2, 3, false] }],                // Headers
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],  // Lists
                    [{ 'align': [] }],                              // Text alignment
                    ['link', 'image', 'video'],                     // Media embedding
                    [{ 'color': [] }, { 'background': [] }],        // Text and background colors
                    ['clean']                                       // Clear formatting
                ]
            }
        });
        
        // Sync content between Quill editor and hidden textarea
        editor.root.innerHTML = $refs.textarea.value;
        editor.on('text-change', function() {
            $refs.textarea.value = editor.root.innerHTML;
        });
        
        // Handle form submission to ensure content is synced
        document.querySelector('form')?.addEventListener('submit', () => {
            $refs.textarea.value = editor.root.innerHTML;
        });
    "
>
    <!-- Quill editor container -->
    <div 
        x-ref="editor" 
        class="form-control border rounded shadow-sm focus:ring focus:ring-opacity-50 {{ $height }}"
    ></div>

    <!-- Hidden textarea to store the content of the Quill editor -->
    <textarea 
        {{ $disabled ? 'disabled' : '' }} 
        {!! $attributes->merge(['class' => 'hidden']) !!}
        x-ref="textarea"
    >{!! $slot !!}</textarea>
</div>
