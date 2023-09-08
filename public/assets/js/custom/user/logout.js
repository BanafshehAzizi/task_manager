function checkToken() {
    const token = localStorage.getItem('token');
    if (!token) {
        window.location.replace('/login');
        return false;
    }
}

$(document).ready(function() {
    if (!checkToken()) {
        return false;
    }
});

function logout() {
    const token = localStorage.getItem('token');

    $.ajax({
        url: "/api/v1/logout",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization' : 'Bearer ' + token
        },
        data: {
        },
        cache: false,
        success: function (data) {
            $('.toast-body').html(data.message);
            $('.toast').toast('show');
            if (data.status == 'success') {
                localStorage.removeItem('token');
                window.location.href = '/login';
                return true;
            }
            return false;
        },
        error: function (data) {
            const message = data.responseJSON.response.validation[0];
            $('.toast-body').html(message);
            $('.toast').toast('show');
        }
    });
}

