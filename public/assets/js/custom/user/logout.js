$(document).ready(function () {
/*    const previousURL = localStorage.getItem('previousURL');
    if (!previousURL || previousURL !== window.location.href) {
        localStorage.setItem('previousURL', window.location.href);
        window.location.href = '/loading';
    }
    localStorage.setItem('previousURL', null);*/
    if (!hasToken()) {
        window.location.href = '/login';
        return false;
    }
    $('#content').show();
    $('#loading').hide();
});

function hasToken() {
    return localStorage.getItem('token');
}
function logout() {
    const token = localStorage.getItem('token');

    $.ajax({
        url: "/api/v1/logout",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + token
        },
        data: {},
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

