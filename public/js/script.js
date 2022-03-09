const form = document.getElementById('form');
const login = document.getElementById('login');
const password = document.getElementById('password');
const btn = document.getElementById('connexion');

//function message d'erreurs
function Erreur(input, message){
    const corps = input.parentElement;
    corps.className = 'corps error';
    const small = corps.querySelector('small');
    small.innerText = message;
}

function Valide(input){
    const corps = input.parentElement;
    corps.className = 'corps success';
}

function Emailtrue(input){
    const vrai = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (vrai.test(input.value.trim().toLowerCase())) {
        Valide(input);
    } else {
        Erreur(input,`Email non valide!`);
    }
}

function vide(inputArray){
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            Erreur(input,`${nomme(input)} is required`);
        }else{
            Valide(input);
        }
    });
}

function nomme(input){
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function tester(input, min, max){
    if(input.value.length < min){
        Erreur(input, `${nomme(input)} must be at least ${min} characters!`)
    }else if(input.value.length > max){
        Erreur(input, `${nomme(input)} must be less than ${max} characters !`);
    }else{
        Valide(input);
    }
}

//Evenemnts
//form.addEventListener('submit',function(e){
    
    connexion.addEventListener('click', e =>{  
   // e.preventDefault();   
    vide([login, password]);    
    tester(password, 6, 15);
    Emailtrue(login);
              
    
});