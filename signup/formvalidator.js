function validateForm() {
    let name = document.forms["formName"]["user_name"].value;
    let username = document.forms["formName"]["user_username"].value;
    let gender = document.forms["formName"]["user_gender"].value;
    let email = document.forms["formName"]["user_email"].value;
    let pass = document.forms["formName"]["user_password"].value;
    let cnfpass = document.forms["formName"]["user_cnf_password"].value;

    if (cnfpass != pass) {
        alert("Password do not Match");
        return false;
    }
    if (name == "") {
        alert("Enter your name ");
        return false;
    }
    if (username == "") {
        alert("Enter your username ");
        return false;
    }
    if (gender == "") {
        alert("Enter your gender ");
        return false;
    }
    if (email == "") {
        alert("Enter your email");
        return false;
    }
}