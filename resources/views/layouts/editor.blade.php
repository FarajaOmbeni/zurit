<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 200px;
            max-height: 250px;
            max-width: 55em;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <textarea id="editor" name="content"></textarea>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'),
            {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            }
        )
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>