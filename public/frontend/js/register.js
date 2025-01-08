function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.querySelector(".toggle-password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePasswordButton.innerHTML = "<i class='fa fa-eye-slash' aria-hidden='true'></i>";
    } else {
        passwordInput.type = "password";
        togglePasswordButton.innerHTML = "<i class='fa fa-eye' aria-hidden='true'></i>";
    }
}