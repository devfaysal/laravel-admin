function tinymceInit(selector = '#tinymce', height=200) {
    tinymce.init({
        selector: selector,
        plugins: 'autosave lists link',
        contextmenu: false,
        menubar: '',
        toolbar: 'bold italic underline removeformat | numlist bullist | link ',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        height: height,
        /* enable title field in the Image dialog*/
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        images_upload_url: 'tinymceImageUploader.php',
        file_picker_types: 'image',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
}

function tinymceDestroy() {
    if (tinymce.activeEditor) {
        tinymce.activeEditor.destroy();
        return true;
    }
}

function tinymceContent() {
    return tinymce.activeEditor.getContent();
}