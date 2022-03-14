const form = document.getElementById('form');
const nom = document.getElementById('nom');
const prenom = document.getElementById('prenom');
const login = document.getElementById('login');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const button = document.getElementById('submit');


form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = login => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(login).toLowerCase());
}

const validateInputs = () => {
    const nomValue = nom.value.trim();
    const prenomValue = prenom.value.trim();
    const loginValue = login.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    if(nomValue === '') {
        setError(nom, 'Name is required');
    } else {
        setSuccess(nom);

    }
    if(prenomValue === '') {
        setError(prenom, 'Surname is required');
    } else {
        setSuccess(prenom);

    }

    if(loginValue === '') {
        setError(login, 'Email is required');
    } else if (!isValidEmail(loginValue)) {
        setError(login, 'Provide a valid email address');
    } else {
        setSuccess(login);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
    } else {
        setSuccess(password2);
    }

};
function upload (img){
    const file = document.getElementById('file');
    file.src=window.URL.createObjectURL(img.files[0]);
}