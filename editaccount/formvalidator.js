function validateForm() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("mail").value;
    let phone = document.getElementById("phone").value;

    let spl = "!@#$%&*()+,-./:;<=>?[]^_`{|}";
    for (let i = 0; i < spl.length; i++) {
        let result = name.includes(spl[i]);
        if (result) {
            document.getElementById('nameInfo').innerHTML = "Name can not contain special character";
            return false;
        }
    }

    if (name == "") {
        document.getElementById('nameInfo').innerHTML = "Name field can not be empty!";
        return false;
    } else {
        document.getElementById('nameInfo').innerHTML = "";
    }







    if (name.length < 4) {
        document.getElementById('nameInfo').innerHTML = "Name is too short";
        return false;
    } else {
        document.getElementById('nameInfo').innerHTML = "";
    }








    if (phone == "") {
        document.getElementById('phoneInfo').innerHTML = "Phone number field cant be emepty";
        return false;
    } else {
        document.getElementById('phoneInfo').innerHTML = "";
    }








    if (email == "") {
        document.getElementById('emailInfo').innerHTML = "Email field can not be empty!";
        return false;
    } else {
        document.getElementById('emailInfo').innerHTML = "";
    }








    if (phone.length != 10) {
        document.getElementById('phoneInfo').innerHTML = "Phone number must be 10 digits!";
        return false;
    } else {
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






    if (!isNaN(name)) {
        document.getElementById('nameInfo').innerHTML = "Only characters are allowed";
        return false;
    } else {
        document.getElementById('nameInfo').innerHTML = "";
    }




    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        document.getElementById('emailInfo').innerHTML = "Invalid Email";
        return false;
    } else {
        document.getElementById('emailInfo').innerHTML = "";

    }





    let haveNumber = /\d/;
    if (haveNumber.test(name)) {
        document.getElementById('nameInfo').innerHTML = " Only characters are allowed";
        return false;
    } else {
        document.getElementById('nameInfo').innerHTML = "";
    }
}