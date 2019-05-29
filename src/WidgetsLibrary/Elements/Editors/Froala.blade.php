<textarea class="froala" name="{{ $field_name }}">{{ $content or '' }}</textarea>

@pushonce('css.additional')
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/css/froala_style.min.css' rel='stylesheet' type='text/css' />
@endpushonce

@pushonce('scripts.additional')
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/js/froala_editor.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/image.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/font_family.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/font_size.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/emoticons.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/paragraph_format.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/paragraph_style.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/align.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/lists.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/table.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/link.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/image.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/file.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/quote.min.js'></script>
<script type='text/javascript' src='/assets/wave/js/froala/code_view.min.js'></script>
@endpushonce

@push('scripts.additional')
<script type="text/javascript">
    $(function() {
        $("textarea[name='{{ $field_name }}']").froalaEditor({
            toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', '|', 'fontFamily', 'fontSize', '|', 'emoticons',
            'paragraphStyle', 'paragraphFormat', 'quote', '|', 'align', 'formatUL', 'outdent', 'indent', '|', 'insertLink', 'insertImage',
            'insertFile', 'insertTable', '|', 'selectAll', 'clearFormatting', 'html'],

            // Set the image upload URL.
            imageUploadURL: '{{ route('wave.froala.file.upload') }}',

            // Additional upload params.
            imageUploadParams: {
                id: '{{ $field_name }}',
                _token: '{{ csrf_token() }}'
            },

            // Set request type.
            imageUploadMethod: 'POST',

            // Set max image size to 2MB.
            imageMaxSize: 2 * 1024 * 1024,

            // Allow to upload PNG and JPG.
            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif']
        });

        //$("div.show-placeholder > div > a").first().css('background-color', 'white');
    });
</script>
@endpush