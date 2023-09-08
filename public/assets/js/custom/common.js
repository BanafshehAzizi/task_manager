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
    const nameRegex = /^[a-zA-Z][a-zA-Z0-9]*$/;
    if (!nameRegex.test(input)) {
        return false;
    }
    return true;
}

function isValidEmail(input) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(input)) {
        return false;
    }
    return true;
}

function isValidPassword(input) {
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    if (!passwordRegex.test(input)) {
        return false;
    }
    return true;
}
