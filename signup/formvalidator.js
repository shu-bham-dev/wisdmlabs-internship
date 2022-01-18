function validateForm() {
    let name = document.getElementById("name").value;
    let username = document.getElementById("username").value;
    let gender = document.getElementById("gender").value;
    let email = document.getElementById("mail").value;
    let pass = document.getElementById("password").value;
    let cnfpass = document.getElementById("cnf-password").value;
    let phone = document.getElementById("phone").value;

    if (cnfpass != pass) {
        alert("Password Must be match");
        return false;
    }
    if (name == "") {
        alert("Name field can not be empty! ");
        return false;
    }
    if (username == "") {
        alert("Username field can not be empty! ");
        return false;
    }
    if (gender == "") {
        alert("gender field can not be empty! ");
        return false;
    }
    if (email == "") {
        alert("email field can not be empty! ");
        return false;
    }
    if (phone.length != 10) {
        alert("Phone number must be 10 digits ");
        return false;
    }
    var letters = /^[A-Za-z]+$/;
    if ((phone[0] != '9') && (phone[0] != '8') && (phone[0] != '7') && (phone[0] != '6') && (phone.match(/^[0-9]+$/) != null)) {
        alert("Phone number should starts with 9/8/7/6 ");
        return false;
    }

    if (name.match(letters)) {
        return true;
    } else {
        alert(" Name must contain letters ");
        return false;
    }
}