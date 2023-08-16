ClassicEditor
    .create(document.querySelector('#ck-editor'), {
        image: {
            styles: {
                options: [ 'alignLeft', 'alignRight' ]
            },
            filebrowserUploadUrl: '/upload/image',
            filebrowserUploadMethod: 'post',
        }
    })
    .then(
        console.log("works!")
    )
    .catch(e => {
        console.log("error : ");
        console.error(e);
    });
