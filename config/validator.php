<?php

function champ_obligatoire(string $key,string $data,array &$errors,string $message="ce champ est obligatoire"){
    if(empty($data)){
        $errors[$key]=$message;
    }
}

function valid_email(string $key,string $data,array &$errors,string $message="email invalid"){
    if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
        $errors[$key]=$message;
    }
}
//valid_question
function valid_question(string $key,string $data,array &$errors,string $message="ce champ est obligatoire"){
  if(empty($data)){
      $errors[$key]=$message;
  }
}


//a revenir
function valid_password(string $key,string $data,array &$errors,string $message="password invalid"){

if(isset($_POST['password'])) {
  $password = $_POST['password'];
  $number = preg_match('@[0-9]@', $password);
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
 // $specialChars = preg_match('@[^\w]@', $password);|| !$specialChars
 
  if(strlen($password) < 6 && !$number && !$uppercase && !$lowercase ) {
    $message ;
  } else {
    $message;
  }
}
if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
 echo "Le mot de passe contient 6 caractères";
} else {
 echo "Mot de passe invalide.";
}


}