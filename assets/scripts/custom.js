function addUserValidation() {
    let username = document.getElementById('txt_username').value;
    let usernameRegex = /^[a-zA-Z][a-zA-Z0-9_]{2,24}$/;
    if (!usernameRegex.test(username))
    {
        document.getElementById('error_usernameValidation').innerHTML =
            "Tên đăng nhập phải có độ dài từ 3 - 25 ký tự, chỉ chứa chữ cái, dấu gạch và chữ số, " +
            "kí tự đầu tiên phải là một chữ cái!";
        return false;
    }
    let password = document.getElementById('txt_password').value;
    let passwordRegex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$&*]).{8,}/;
    if (!passwordRegex.test(password))
    {
        document.getElementById('error_passwordValidation').innerHTML = "Mật khẩu phải có độ dài tối thiểu là 8 kí tự, "
            + "bao gồm kí tự: chữ hoa, chữ thường, chữ số và kí tự đặc biệt";
        return false;
    }
    let retypePassword = document.getElementById('txt_retypePassword').value;
    if (password.localeCompare(retypePassword) !== 0)
    {
        document.getElementById('error_retypePasswordValidation').innerHTML = "Nhập lại mật khẩu sai";
        return false;
    }
}

function changePasswordValidation() {
    let newPassword = document.getElementById('txt_newPassword').value;
    let newPasswordRegex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$&*]).{8,}/;
    if (!newPasswordRegex.test(newPassword)){
        document.getElementById('error_newPasswordValidation').innerHTML = "Mật khẩu phải có độ dài tối thiểu là 8 kí tự, "
            + "bao gồm kí tự: chữ hoa, chữ thường, chữ số và kí tự đặc biệt";
        return false;
    }
    let retypeNewPassword = document.getElementById('txt_retypeNewPassword').value;
    if (newPassword.localeCompare(retypeNewPassword) !== 0)
    {
        document.getElementById('error_retypeNewPasswordValidation').innerHTML = "Nhập lại mật khẩu mới sai";
        return false;
    }
}