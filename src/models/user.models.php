<?php
function find_user_login_password(string $login,string $password):array{
    //ORM
   $users=json_to_array("users");
    foreach ($users as $user) {
        if( $user['login']==$login && $user['password']==$password)
        return $user;
    }
    return [];
}

function find_users(string $role):array{
    $users=json_to_array("users");
    $result=[];
    foreach ($users as $user) {
        if( $user['role']==$role){
            $result[]=$user;
        }
    }
    return $result;
}
function register_user_data():array{
    $extra = [
        "nom"=>$_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "login"=> $_POST['login'],
        "password"=> $_POST['password'],
        "role"=> $_POST['role'],
        "score"=> $_POST['score']
    ];
    return $extra;
}

function question_data():array{
    $quest = array(
        "intitule" => $_POST['questions'],
        "number" => $_POST['number'],
        "reponse" => $_POST['reponse'],
        "check" => $_POST['rep'],
        "solution" => $_POST['solution']
    );
    return $quest;
}