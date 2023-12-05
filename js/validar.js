document.addEventListener("DOMContentLoaded", function () {
    let emailInput = document.getElementById("email");
    let pwdInput = document.getElementById("pwd");
    let confirmPwdInput = document.getElementById("confirmPwd");
    let nameInput = document.getElementById("name");
    let form = document.querySelector("form");
    let submitButton = document.querySelector("button[type='submit']");
    let surnameInput = document.getElementById("surname");
    let phoneInput = document.getElementById("phone");

    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,}$/;

    function checkPasswordStrength(password) {
        return passwordRegex.test(password);
    }

    function checkEmailStructure(email) {
        return /\S+@\S+\.\S+/.test(email);
    }

    function checkNameStructure(name) {
        return /^[A-Za-z\s]+$/.test(name);
    }

    function checkSurnameStructure(surname) {
        return /^[A-Za-z\s]+$/.test(surname);
    }

    function checkPhoneStructure(phone) {
        return /^\d{10}$/.test(phone); // Asume un número de 10 dígitos
    }

    function validateInput(input, validatorFunction, message) {
        let feedbackElement = input.nextElementSibling;

        // Verifica si el elemento de feedback existe y si no, lo crea
        if (!feedbackElement || !feedbackElement.classList.contains("invalid-feedback")) {
            feedbackElement = document.createElement("div");
            feedbackElement.classList.add("invalid-feedback");
            input.parentNode.insertBefore(feedbackElement, input.nextSibling);
        }

        if (validatorFunction(input.value)) {
            input.classList.add("is-valid");
            input.classList.remove("is-invalid");
            feedbackElement.style.display = "none";
        } else {
            input.classList.add("is-invalid");
            input.classList.remove("is-valid");
            feedbackElement.textContent = message;
            feedbackElement.style.display = "block";
        }
    }

    emailInput.addEventListener("input", function () {
        validateInput(emailInput, checkEmailStructure, "El correo electrónico no es válido.");
    });

    pwdInput.addEventListener("input", function () {
        validateInput(pwdInput, checkPasswordStrength, "La contraseña no es segura, al menos una mayuscula, un numero y un caracter especial.");
    });

    confirmPwdInput.addEventListener("input", function () {
        validateInput(confirmPwdInput, function (value) {
            return value === pwdInput.value && checkPasswordStrength(value);
        }, "Las contraseñas no coinciden o no son seguras.");
    });

    nameInput.addEventListener("input", function () {
        validateInput(nameInput, checkNameStructure, "El nombre contiene caracteres no permitidos.");
    });

    surnameInput.addEventListener("input", function () {
        validateInput(surnameInput, checkSurnameStructure);
    });

    phoneInput.addEventListener("input", function () {
        validateInput(phoneInput, checkPhoneStructure);
    });

    // Toggle visibility for password
    document.getElementById("togglePwd").addEventListener("click", function () {
        let icon = this.querySelector("i");
        if (pwdInput.type === "password") {
            pwdInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            pwdInput.type = "password";
            icon.classList.add("fa-eye");
            icon.classList.remove("fa-eye-slash");
        }
    });

    document.getElementById("toggleConfirmPwd").addEventListener("click", function () {
        let icon = this.querySelector("i");
        if (confirmPwdInput.type === "password") {
            confirmPwdInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            confirmPwdInput.type = "password";
            icon.classList.add("fa-eye");
            icon.classList.remove("fa-eye-slash");
        }
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        // Referencias al botón y al ícono de carga
        const submitButton = document.getElementById('submitButton');
        const loadingIcon = document.getElementById('loadingIcon');

        if (emailInput.classList.contains("is-invalid") ||
            pwdInput.classList.contains("is-invalid") ||
            confirmPwdInput.classList.contains("is-invalid") ||
            nameInput.classList.contains("is-invalid") ||
            surnameInput.classList.contains("is-invalid") || // Nueva verificación
            phoneInput.classList.contains("is-invalid")) {    // Nueva verificación
            alert("Hay errores en el formulario. Por favor, corrígelos antes de continuar.");
            return;
        }

        // Desactivar el botón y mostrar el ícono de carga
        submitButton.disabled = true;
        loadingIcon.style.display = 'inline-block';

        // Envío de formulario mediante AJAX
        let formData = new FormData(form);
        fetch('../php/actions/register_user.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    // Lanza un error si la respuesta no es un código 200 OK
                    return response.text().then(text => {
                        throw new Error(text);
                    });
                }
                return response.json();
            })
            .then(data => {
                displayMessage(data.message, data.success);
            })
            .catch(error => {
                console.error('Error:', error);
                displayMessage(error.message, false);
            })
            .finally(() => {
                // Reactivar el botón y ocultar el ícono de carga al finalizar el envío
                submitButton.disabled = false;
                loadingIcon.style.display = 'none';
            });
    });


    function displayMessage(message, isSuccess) {
        // Remover mensaje anterior si existe
        let oldMessage = document.getElementById("userMessage");
        if (oldMessage) {
            oldMessage.remove();
        }

        let msgElement = document.createElement("div");
        msgElement.id = "userMessage";
        msgElement.className = "alert mt-4";
        msgElement.className += isSuccess ? " alert-success" : " alert-danger";
        msgElement.innerHTML = `
            ${message}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        `;
        form.insertAdjacentElement('beforebegin', msgElement);
    }
});
