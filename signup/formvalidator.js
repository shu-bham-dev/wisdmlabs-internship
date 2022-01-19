function validateForm() {
    let name = document.getElementById("name").value;
    let username = document.getElementById("username").value;
    let gender = document.getElementById("gender").value;
    let email = document.getElementById("mail").value;
    let pass = document.getElementById("password").value;
    let cnfpass = document.getElementById("cnf-password").value;
    let phone = document.getElementById("phone").value;

    if (name == "") {
        document.getElementById('nameInfo').innerHTML = "Name field can not be empty!";
        return false;
    }
    if (cnfpass != pass) {
        document.getElementById('cnfInfo').innerHTML = "Password do not match";
        return false;
    }
    // let a = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
    // let ans = a.test(name);
    // if (!ans) {
    //     document.getElementById('nameInfo').innerHTML = "Name should not contain numbers or extra white spaces!";
    //     return false;
    // }
    let b = /\s/g;
    res = b.test(username);
    if (res) {
        document.getElementById('usernameInfo').innerHTML = "Invalid username";
        return false;
    }
    if (username == "") {
        document.getElementById('usernameInfo').innerHTML = "Username field can not be empty!";
        return false;
    }
    if (pass == "") {
        document.getElementById('passInfo').innerHTML = "Password field can not be empty!";
        return false;
    }
    if (name.length < 4) {
        document.getElementById('nameInfo').innerHTML = "Name is too short";
        return false;
    }
    if (username.length < 4) {
        document.getElementById('usernameInfo').innerHTML = "Username is too short!";
        return false;
    }
    if (gender == "") {
        document.getElementById('genderInfo').innerHTML = "Gender field can not be empty!";
        return false;
    }
    if (email == "") {
        document.getElementById('emailInfo').innerHTML = "Email field can not be empty!";
        return false;
    }
    if (phone == "") {
        document.getElementById('phoneInfo').innerHTML = "Phone number field cant be emepty";
        return false;
    }
    if (phone.length != 10) {
        document.getElementById('phoneInfo').innerHTML = "Phone number must be 10 digits!";
        return false;
    }
    if ((phone[0] != '9') && (phone[0] != '8') && (phone[0] != '7') && (phone[0] != '6') && (phone.match(/^[0-9]+$/) != null)) {
        document.getElementById('phoneInfo').innerHTML = "Invalid Phone Number!";
        return false;
    }
    if (isNaN(phone)) {
        document.getElementById('phoneInfo').innerHTML = "Phone must contains number only ";
        return false;
    }

    if (!isNaN(name)) {
        document.getElementById('nameInfo').innerHTML = " ** only characters are allowed";
        return false;
    }
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        document.getElementById('emailInfo').innerHTML = "Invalid Email";
        return false;
    }

}