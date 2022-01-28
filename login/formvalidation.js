function validateForm() {
    let username = document.getElementById("username").value;
    let pass = document.getElementById("password").value;

    let b = /\s/g;
    res = b.test(username);
    let d = /\s/;
    res1 = d.test(username);

    if (res1) {
        document.getElementById('usernameInfo').innerHTML = "Username cant have whitespace";
        return false;
    } else {
        document.getElementById('usernameInfo').innerHTML = "";
    }



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





    if (pass == "") {
        document.getElementById('passInfo').innerHTML = "Password field can not be empty!";
        return false;
    } else {
        document.getElementById('passInfo').innerHTML = "";
    }









    if (username.length < 4) {
        document.getElementById('usernameInfo').innerHTML = "User not found!";
        return false;
    } else {
        document.getElementById('usernameInfo').innerHTML = "";
    }




}