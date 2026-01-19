 {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#body'), {
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3'
                    },
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold', 'italic', 'link',
                    'bulletedList', 'numberedList',
                    'blockQuote',
                    '|',
                    'undo', 'redo'
                ]
            }
        });
    </script>