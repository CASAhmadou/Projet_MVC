<?php 
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.models.php");
// Traitement des Requetes POST
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
           //die("Je suis sur l'action de connexion"); 
          // echo"ok";die;
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
            $ext_file=(explode('.',$file));
            $ext=strtolower(end($ext_file));
            var_dump($ext);die;
            inscription($prenom,$nom,$login,$password,$password2,$role,$score,$file,$tempname,$ext); 
                    
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
function inscription(string $prenom ,string $nom,string $login,string $password,string $password2,string $file,string $tempname,string $ext){
 
    $errors=[];

    champ_obligatoire('prenom',$prenom,$errors,"prenom obligatoire");
    champ_obligatoire('nom',$nom,$errors,"nom obligatoire");
    champ_obligatoire('password',$password,$errors,"password obligatoire");
    champ_obligatoire('password2',$password2,$errors,"password obligatoire");
    champ_obligatoire('login',$login,$errors,"login obligatoire");
    if(count($errors)==0){
        valid_email('login',$login,$errors);
    }
    //verification de l'extension
    $tabfile=['jpg','png','jpeg'];
    if ($file!='') {
        foreach ($tabfile as $value) {
            if ($ext!=$value) {
                $errors['erImg']='image not found';
                break;
            }
        } 
    }
    if (count($errors)==0) {

        $newUser = register_user_data();
        array_to_json($newUser,"users");

        move_uploaded_file($tempname,PATH_UPLOAD,$file);

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

   /*<?php
error_reporting(0);
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "image/".$filename;
		
	$db = mysqli_connect("localhost", "root", "", "photos");

		// Get all the submitted data from the form
		$sql = "INSERT INTO image (filename) VALUES ('$filename')";

		// Execute query
		mysqli_query($db, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
$result = mysqli_query($db, "SELECT * FROM image");
?>
*/ 












