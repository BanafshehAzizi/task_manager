$(document).ready(function() {
    showAuthors();
});

function showAuthors() {
    const token = localStorage.getItem('token');

    $.ajax({
        url: "/api/v1/users",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization' : 'Bearer ' + token
        },
        data: {
        },
        cache: false,
        success: function (data) {
            if (data.status == 'success') {
                let html = '';
                data.response.forEach((value, key) => {
                    html += `<option value="${value.id}">${value.first_name} ${value.last_name}</option>`;
                });
                $('#author').html(html);
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

