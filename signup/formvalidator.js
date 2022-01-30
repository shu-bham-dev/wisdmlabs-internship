function validateForm() {
    let name = document.getElementById("name").value;
    let username = document.getElementById("username").value;
    let gender = document.getElementById("gender").value;
    let email = document.getElementById("mail").value;
    let pass = document.getElementById("password").value;
    let cnfpass = document.getElementById("cnf-password").value;
    let phone = document.getElementById("phone").value;

    let haveNumber = /\d/;
    if (haveNumber.test(name)) {
        document.getElementById('nameInfo').innerHTML = " Only characters are allowed";
        return false;
    } else {
        document.getElementById('nameInfo').innerHTML = "";
    }


    if (name == "") {
        document.getElementById('nameInfo').innerHTML = "Name field can not be empty!";
        return false;
    } else {
        document.getElementById('nameInfo').innerHTML = "";
    }


    let spl = "!@#$%&*()+,-./:;<=>?[]^_`{|}";
    for (let i = 0; i < spl.length; i++) {
        let result = name.includes(spl[i]);
        if (result) {
            document.getElementById('nameInfo').innerHTML = "Name can not contain special character";
            return false;
        }
    }


    for (let i = 0; i < spl.length; i++) {
        let result = username.includes(spl[i]);
        if (result) {
            document.getElementById('usernameInfo').innerHTML = "Username can not contain special character";
            return false;
        }
    }

    let containSpaces = /\s/g;
    res = containSpaces.test(username);
    if (res) {
        document.getElementById('usernameInfo').innerHTML = "Invalid username";
        return false;
    } else {
        document.getElementById('usernameInfo').innerHTML = "";
    }




    if (username == "") {
        document.getElementById('usernameInfo').innerHTML = "Username field can not be empty!";
        return false;
    } else {
        document.getElementById('usernameInfo').innerHTML = "";
    }



    if (phone == "") {
        document.getElementById('phoneInfo').innerHTML = "Phone number field cant be empty";
        return false;
    } else {
        document.getElementById('phoneInfo').innerHTML = "";
    }



    if (phone.length != 10) {
        document.getElementById('phoneInfo').innerHTML = "Phone number must be 10 digits!";
        return false;
    } else {
        document.getElementById('phoneInfo').innerHTML = "";
    }



    if (cnfpass != pass) {
        document.getElementById('cnfInfo').innerHTML = "Password do not match";
        return false;
    } else {
        document.getElementById('cnfInfo').innerHTML = "";
    }






    if (pass == "") {
        document.getElementById('passInfo').innerHTML = "Password field can not be empty!";
        return false;
    } else {
        document.getElementById('passInfo').innerHTML = "";
    }



    if (name.length < 3) {
        document.getElementById('nameInfo').innerHTML = "Name is too short";
        return false;
    } else {
        document.getElementById('nameInfo').innerHTML = "";
    }



    if (username.length < 4) {
        document.getElementById('usernameInfo').innerHTML = "Username is too short!";
        return false;
    } else {
        document.getElementById('usernameInfo').innerHTML = "";
    }



    if (gender == "") {
        document.getElementById('genderInfo').innerHTML = "Gender field can not be empty!";
        return false;
    } else {
        document.getElementById('genderInfo').innerHTML = "";
    }



    if (email == "") {
        document.getElementById('emailInfo').innerHTML = "Email field can not be empty!";
        return false;
    } else {
        document.getElementById('emailInfo').innerHTML = "";
    }



    if (!isNAN(phone)) {
        document.getElementById('phoneInfo').innerHTML = "";
    }




    if ((phone[0] != '9') && (phone[0] != '8') && (phone[0] != '7') && (phone[0] != '6') && (phone.match(/^[0-9]+$/) != null)) {
        document.getElementById('phoneInfo').innerHTML = "Invalid Phone Number!";
        return false;
    } else {
        document.getElementById('phoneInfo').innerHTML = "";
    }



    if (isNaN(phone)) {
        document.getElementById('phoneInfo').innerHTML = "Phone must contains number only ";
        return false;
    } else {
        document.getElementById('phoneInfo').innerHTML = "";
    }


    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        document.getElementById('emailInfo').innerHTML = "Invalid Email";
        return false;
    } else {
        document.getElementById('emailInfo').innerHTML = "";
    }
}