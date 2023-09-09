$(document).ready(function () {
    $('.toast').toast('hide');
});

function isNotEmpty(input) {
    if (input === undefined || input.trim() === "") {
        return false;
    }
    return true;
}

function isValidName(input) {
    const name_regex = /^[a-zA-Z][a-zA-Z0-9\s]*$/;
    if (!name_regex.test(input)) {
        return false;
    }
    return true;
}

function isValidDescription(input) {
    const name_regex = /^[a-zA-Z0-9\s.,!?]+$/;
    if (!name_regex.test(input)) {
        return false;
    }
    return true;
}

function isValidDate(input) {
    var is_valid = moment(input, 'YYYY-MM-DDTHH:mm', true).isValid();
    if (is_valid) {
        return true;
    }
    return false;
}

function isValidUuid(input) {
    const uuid_regex = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i;
    if (!uuid_regex.test(input)) {
        return false;
    }
    return true;
}

function isValidEmail(input) {
    const email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email_regex.test(input)) {
        return false;
    }
    return true;
}

function isValidPassword(input) {
    const password_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    if (!password_regex.test(input)) {
        return false;
    }
    return true;
}
