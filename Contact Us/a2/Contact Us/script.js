function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var contactNumber = document.getElementById("contactNumber").value;
    var message = document.getElementById("message").value;

    if (username === "" || email === "" || contactNumber === "" || message === "") {
        alert("Please fill in all the fields");
        return false;
    }

    if (!validateEmail(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (!validateContactNumber(contactNumber)) {
        alert("Please enter a valid 10-digit contact number");
        return false;
    }

    return true;
}

function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateContactNumber(contactNumber) {
    var contactNumberRegex = /^\d{10}$/;
    return contactNumberRegex.test(contactNumber);
}