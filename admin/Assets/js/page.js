const page = {
    ajaxMethod: 'POST',

    add() {
        const formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/admin/page/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend() {

            },
            success(result) {
                console.log(result);
                window.location = '/admin/pages/edit/' + result;
            }
        });
    },

    update() {
        const formData = new FormData();

        formData.append('page_id', $('#formPageId').val());
        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/admin/page/update/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend() {

            },
            success(result) {
                console.log(result);
            }
        });
    }
};

console.log(page);