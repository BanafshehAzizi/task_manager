$(document).ready(function () {
    showAuthors();
    const current_url = window.location.href;
    if (current_url.includes('/articles/')) {
        const url_parts = current_url.split('/articles/');
        const uuid = url_parts[1];
        if (isNotEmpty(uuid)) {
            const token = localStorage.getItem('token');

            $.ajax({
                url: "/api/v1/articles/" + uuid,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + token,
                },
                data: {},
                cache: false,
                success: function (data) {
                    if (data.status == 'success') {
                        $('#title').val(data.response[0].title);
                        const published_at = moment(data.response[0].published_at, "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DDTHH:mm");
                        $('#published_at').val(published_at);
                        $('#author_id').val(data.response[0].author_id);
                        $('#description').html(data.response[0].detail.description);
                    }
                },
                error: function (data) {
                    const message = Object.values(data.responseJSON.response.validation)[0];
                    $('.message').html(message);
                }
            });
        }
    }
});

function showAuthors() {
    const token = localStorage.getItem('token');

    $.ajax({
        url: "/api/v1/users",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + token
        },
        data: {},
        cache: false,
        success: function (data) {
            if (data.status == 'success') {
                let html = '';
                data.response.forEach((value, key) => {
                    html += `<option value="${value.id}">${value.first_name} ${value.last_name}</option>`;
                });
                $('#author_id').html(html);
                return true;
            }

            $('.toast-body').html(data.message);
            $('.toast').toast('show');
            return false;
        },
        error: function (data) {
            const message = data.responseJSON.response.validation[0];
            $('.toast-body').html(message);
            $('.toast').toast('show');
        }
    });
}


function insert() {
    const token = localStorage.getItem('token');
    const title = $('#title').val();
    let published_at = $('#published_at').val();
    const author_id = $('#author_id').val();
    const description = $('#description').val();

    const title_validation = isNotEmpty(title) && isValidName(title);
    if (title_validation == false) {
        /*        $('.toast-body').html('The title field is invalid');
                $('.toast').toast('show');*/
        $('.message').html('The title field is invalid');
        return false;
    }
    if (title.length < 3 || title.length > 50) {
        /*        $('.toast-body').html('The title must have between 3 and 50 characters');
                $('.toast').toast('show');*/
        $('.message').html('The title must have between 3 and 50 characters')
        return false;
    }
    const published_at_validation = isNotEmpty(published_at) && isValidDate(published_at);
    if (published_at_validation == false) {
        $('.message').html('The publication date field is invalid');
        // $('.toast').toast('show');
        return false;
    }
    published_at = new Date(published_at);
    published_at = published_at.getFullYear() + "-" + (published_at.getMonth() + 1) + "-" + published_at.getDate() + " " + published_at.getHours() + ":" + published_at.getMinutes() + ":00";
    published_at = moment(published_at, "YYYY-M-D H:mm:ss").format("YYYY-MM-DD HH:mm:ss");
    const author_id_validation = isNotEmpty(author_id) && isValidUuid(author_id)
    if (author_id_validation == false) {
        $('.message').html('The author field is invalid');
        // $('.toast').toast('show');
        return false;
    }
    const description_validation = isNotEmpty(description) && isValidDescription(description);
    if (description_validation == false) {
        $('.message').html('The description field is invalid');
        // $('.toast').toast('show');
        return false;
    }
    if (description.length < 10 || description.length > 65000) {
        $('.message').html('The title must have between 10 and 65000 characters');
        // $('.toast').toast('show');
        return false;
    }
    $.ajax({
        url: "/api/v1/articles",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + token,
        },
        data: {
            title: title,
            published_at: published_at,
            author_id: author_id,
            description: description
        },
        cache: false,
        success: function (data) {
            $('.message').html(data.message);
            // $('.toast').toast('show');
        },
        error: function (data) {
            const message = Object.values(data.responseJSON.response.validation)[0];
            $('.message').html(message);
            // $('.toast').toast('show');
        }
    });
}


function update() {
    const token = localStorage.getItem('token');
    const title = $('#title').val();
    let published_at = $('#published_at').val();
    const author_id = $('#author_id').val();
    const description = $('#description').val();

    const title_validation = isNotEmpty(title) && isValidName(title);
    if (title_validation == false) {
        /*        $('.toast-body').html('The title field is invalid');
                $('.toast').toast('show');*/
        $('.message').html('The title field is invalid');
        return false;
    }
    if (title.length < 3 || title.length > 50) {
        /*        $('.toast-body').html('The title must have between 3 and 50 characters');
                $('.toast').toast('show');*/
        $('.message').html('The title must have between 3 and 50 characters')
        return false;
    }
    const published_at_validation = isNotEmpty(published_at) && isValidDate(published_at);
    if (published_at_validation == false) {
        $('.message').html('The publication date field is invalid');
        // $('.toast').toast('show');
        return false;
    }
    published_at = new Date(published_at);
    published_at = published_at.getFullYear() + "-" + (published_at.getMonth() + 1) + "-" + published_at.getDate() + " " + published_at.getHours() + ":" + published_at.getMinutes() + ":00";
    published_at = moment(published_at, "YYYY-M-D H:mm:ss").format("YYYY-MM-DD HH:mm:ss");
    const author_id_validation = isNotEmpty(author_id) && isValidUuid(author_id)
    if (author_id_validation == false) {
        $('.message').html('The author field is invalid');
        // $('.toast').toast('show');
        return false;
    }
    const description_validation = isNotEmpty(description) && isValidDescription(description);
    if (description_validation == false) {
        $('.message').html('The description field is invalid');
        // $('.toast').toast('show');
        return false;
    }
    if (description.length < 10 || description.length > 65000) {
        $('.message').html('The title must have between 10 and 65000 characters');
        // $('.toast').toast('show');
        return false;
    }

    const current_url = window.location.href;
    const url_parts = current_url.split('/articles/');
    const uuid = url_parts[1];
    console.log(            title,
        published_at,
        author_id,
        description);
    $.ajax({
        url: "/api/v1/articles/" + uuid,
        type: "PUT",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + token,
        },
        data: {
            title: title,
            published_at: published_at,
            author_id: author_id,
            description: description
        },
        cache: false,
        success: function (data) {
            $('.message').html(data.message);
            // $('.toast').toast('show');
        },
        error: function (data) {
            const message = Object.values(data.responseJSON.response.validation)[0];
            $('.message').html(message);
            // $('.toast').toast('show');
        }
    });
}

