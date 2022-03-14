<?php 
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.models.php");
// Traitement des Requetes POST
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
          // echo"ok";die; //vérification de l'action
            $login=$_POST['login'];
            $password=$_POST['password'];
            connexion($login,$password);
        }
        if ($_REQUEST['action']=="register") {
           $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $role = $_POST['role'];
            $score = $_POST['score'];
            $file = $_FILES['picture']['name'];
            $tempname = $_FILES["picture"]["tmp_name"];
            $login1 = basename($login,"@gmail.com");
            $ext_file=(explode('.',$file));
            $ext=strtolower(end($ext_file));
            $file=$login1.".".$role.".".$ext;
            $file1 = basename($file,".".$ext).PHP_EOL;
            //var_dump($file);die;
            $_FILES['picture']['name']=$file;
            
            //var_dump($tempname);die;
            inscription($prenom,$nom,$login,$password,$password2,$role,$score,$file,$ext,$tempname); 
                    
        }
    } 
}
// Traitement des Requetes GET
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
           require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
        }elseif($_REQUEST['action']=="deconnexion"){
            logout();
        }elseif ($_REQUEST['action']=="register"){
            require_once(PATH_VIEWS."securite/register.html.php");            
        }
    }else {
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
        }
}
//les fonctions:
function connexion(string $login,string $password):void{ 
    
    $errors=[];
    champ_obligatoire('login',$login,$errors,"login obligatoire");
    if(count($errors)==0){
        valid_email('login',$login,$errors);
    }
    champ_obligatoire('password',$password,$errors);
    if(count($errors)==0){
         valid_password('password',$password,$errors);
        //Appel d'une fonction du model
        $user=find_user_login_password($login,$password);
        // Utilisateur existe
        if (count($user)!=0) {
            //var_dump($user);die();
            $_SESSION[KEY_USER_CONNECT]=$user;
            // /?controller=user&action=accueil
            header("location:".WEB_ROOT.'?controller=user&action=accueil');
            exit();
        }else {
            //Utilisateur n'existe pas
            $errors['connexion']="Login ou Mot de passe Incorrect";
            $_SESSION[KEY_ERRORS]=$errors;
            //Création d'une session pour enregistrer le login 
            $_SESSION["login"]=$login;
           
            header("location:".WEB_ROOT);
            exit();
        }    
    }else {
        //Erreur de validation
        $_SESSION[KEY_ERRORS]=$errors; 
       
        header("location:".WEB_ROOT);
        exit();
    }    
}


//Inscription
function inscription(string $prenom ,string $nom,string $login,string $password,string $password2,string $role,string $score,string|array $file,string $ext,string $tempname){

    $errors=[];

    champ_obligatoire('prenom',$prenom,$errors,"prenom obligatoire");
    champ_obligatoire('nom',$nom,$errors,"nom obligatoire");
    champ_obligatoire('password',$password,$errors,"password obligatoire");
    champ_obligatoire('password2',$password2,$errors,"password obligatoire");
    champ_obligatoire('login',$login,$errors,"login obligatoire");
    champ_obligatoire('picture',$file,$errors,"picture obligatoire");
    champ_obligatoire('tmp_name',$tempname,$errors," obligatoire");
    // champ_obligatoire('ext',$ext,$errors,"ext obligatoire");
        
    if(count($errors)==0){
        valid_email('login',$login,$errors);
    }
    //verification de l'extension
    
    $tabfile=['jpg','png','jpeg'];
    if ($file!='') {
        if(!in_array($ext,$tabfile)){
            $errors['erImg']='image not found';
        }        
    }
    
    
    
    if (count($errors)==0) {
        $newUser = register_user_data();
        array_to_json($newUser,"users");
        move_uploaded_file($tempname,PATH_UPLOAD.$file);
        
       //  var_dump($_FILES['picture']['name']);die('tst');
    //    var_dump($errors);die;
        if (is_admin()) {
            header("location:".WEB_ROOT."?controller=user&action=register");
            exit();
        }
        header("location:".WEB_ROOT."?controller=securite");
        exit();
    }else{
        if (is_admin()) {
           
            $_SESSION[KEY_ERRORS]=$errors; 
            header("location:".WEB_ROOT."?controller=user&action=register");
            exit();
        }
        $_SESSION[KEY_ERRORS]=$errors;
        header("location:".WEB_ROOT."?controller=securite&action=register");
        exit();
    }
}
// pour la déconnexion
function logout(){
    session_destroy();
    header("location:".WEB_ROOT);
    exit();
}