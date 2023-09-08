function register() {
    const first_name = $('#first_name').val();
    const last_name = $('#last_name').val();
    const email = $('#email').val();
    const password = $('#password').val();

    const first_name_validation = isNotEmpty(first_name) && isValidName(first_name);
    const last_name_validation = isNotEmpty(last_name) && isValidName(last_name);
    const email_validation = isNotEmpty(email) && isValidEmail(email);
    const password_validation = isNotEmpty(password) && isValidPassword(password);

    if (first_name_validation == false) {
        $('.toast-body').html('The first name field is invalid');
        $('.toast').toast('show');
        return false;
    }

    if (last_name_validation == false) {
        $('.toast-body').html('The last name field is invalid');
        $('.toast').toast('show');
        return false;
    }

    if (email_validation == false) {
        $('.toast-body').html('The email field is invalid');
        $('.toast').toast('show');
        return false;
    }

    if (password_validation == false) {
        $('.toast-body').html('The password field is invalid (Valid Password : At least one digit, At least one lowercase letter ' +
            ', At least one uppercase letter \n' +
            ', Minimum length of 8 characters)');
        $('.toast').toast('show');
        return false;
    }

    $.ajax({
        url: "/api/v1/register",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            first_name:first_name,
            last_name:last_name,
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
