$(document).ready(function () {
    $('.toast').toast('hide');
});

function login() {
    const email = $('#email').val();
    const password = $('#password').val();

    const email_validation = isNotEmpty(email);
    const password_validation = isNotEmpty(password);

    if (email_validation == false) {
        $('.toast-body').html('The item email field is invalid');
        $('.toast').toast('show');
        return false;
    }

    if (password_validation == false) {
        $('.toast-body').html('The item password field is invalid');
        $('.toast').toast('show');
        return false;
    }
    $.ajax({
        url: "/api/v1/login",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            email: email,
            password : password
        },
        cache: false,
        success: function (data) {
            $('.toast-body').html(data.message);
            $('.toast').toast('show');
            if (data.status == 'success') {
                const token = data.response.token;
                localStorage.setItem('token', token);
                window.location.href = '/dashboard';
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

function isNotEmpty(name) {
    if (name === undefined || name.trim() === "") {
        return false;
    }
    return true;
}
