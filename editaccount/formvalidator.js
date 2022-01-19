function validateForm() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("mail").value;
    let phone = document.getElementById("phone").value;

    // let a = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
    // let ans = a.test(name);
    // if (!ans) {
    //     document.getElementById('nameInfo').innerHTML = "Name should not contain numbers or extra white spaces!";
    //     return false;
    // }
    if (name == "") {
        // alert("Name field can not be empty! ");
        document.getElementById('nameInfo').innerHTML = "Name field can not be empty!";
        return false;
    }
    if (name.length < 4) {
        document.getElementById('nameInfo').innerHTML = "Name is too short";
        return false;
    }
    if (phone == "") {
        document.getElementById('phoneInfo').innerHTML = "Phone number field cant be emepty";
        return false;
    }
    if (email == "") {
        // alert("email field can not be empty! ");
        document.getElementById('emailInfo').innerHTML = "Email field can not be empty!";
        return false;
    }
    if (phone.length != 10) {
        document.getElementById('phoneInfo').innerHTML = "Phone number must be 10 digits!";
        return false;
    }
    // var letters = /^[A-Za-z]+$/;
    if ((phone[0] != '9') && (phone[0] != '8') && (phone[0] != '7') && (phone[0] != '6') && (phone.match(/^[0-9]+$/) != null)) {
        // alert("Phone number should starts with 9/8/7/6 ");
        document.getElementById('phoneInfo').innerHTML = "Invalid Phone Number!";
        return false;
    }
    if (isNaN(phone)) {
        document.getElementById('phoneInfo').innerHTML = "Phone must contains number only ";
        return false;
    }

    if (!isNaN(name)) {
        document.getElementById('nameInfo').innerHTML = "Only characters are allowed";
        return false;
    }

    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        document.getElementById('emailInfo').innerHTML = "Invalid Email";
        return false;
    }
}