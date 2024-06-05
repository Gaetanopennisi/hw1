function checkName(event) {
    const input = event.currentTarget;
    
    if (input.value.length > 0) {
        formStatus[input.name] = true;
        input.parentNode.classList.remove('errorj');
    } else {
        formStatus[input.name] = false;
        input.parentNode.classList.add('errorj');
    }
    
    if (formStatus[input.name]) {
        input.parentNode.classList.remove('errorj');
    }
}

function checkSurname(event) {
    const input = event.currentTarget;
    
    if (input.value.length > 0) {
        formStatus[input.name] = true;
        input.parentNode.classList.remove('errorj');
    } else {
        formStatus[input.name] = false;
        input.parentNode.classList.add('errorj');
    }

    if (formStatus[input.name]) {
        input.parentNode.classList.remove('errorj');
    }
}

function jsonCheckUsername(json) {
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('errorj');
        document.querySelector('.username span').innerHTML = '';
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
    }
}

function jsonCheckEmail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
        document.querySelector('.email span').innerHTML = '';
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.classList.add('errorj');
        formStatus.username = false;

    } else {
        fetch("check_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;

    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
        document.querySelector('.password span').innerHTML = '';
    } else {
        document.querySelector('.password').classList.add('errorj');
        document.querySelector('.password span').textContent = "Inserisci almeno 8 caratteri";
    }

}


function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
        document.querySelector('.confirm_password span').textContent = "Le password sono diverse";
    }
}




const formStatus = {'upload': true};
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);






