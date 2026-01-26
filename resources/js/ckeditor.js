import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export function mountEditor() {
    const el = document.querySelector('#body')
    if (!el) return

    ClassicEditor.create(el, {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold', 'italic', 'link',
                '|',
                'bulletedList', 'numberedList',
                '|',
                'insertTable',
                '|',
                'undo', 'redo'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        }
    }).catch(console.error)
}
