<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.models.php");

//Traitement des Requetes
/*if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion")
        echo"Traiter le formulaire de connexion";
    }
}*/

//Traitement des Requetes GET
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_REQUEST['action'])){
        if(!is_connect()) {
            header("location:".WEB_ROOT);
            exit();
         }
        if($_REQUEST['action']=="accueil"){
            if (is_admin()) {
                lister_joueur();
            
            }elseif(is_joueur()) {
                jeu();
            }  
        }elseif ($_REQUEST['action']=="liste.joueur") {
            lister_joueur();

        }elseif ($_REQUEST['action']=="register") {
            inscription_register();
        }
    }    
}

function lister_joueur(){
    //Appel du model
    ob_start();
    $data= find_users(ROLE_JOUEUR);
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."liste.joueur.html.php");
    $content_for_views=ob_get_clean();
    //Recupération d'un fichier html dans une variable
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}

function jeu(){
    //Appel du model
    ob_start();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."jeu.html.php");
    $content_for_views=ob_get_clean();
    //Recupération d'un fichier html dans une variable
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
 }

 function inscription_register(){
    //Appel du model
  ob_start();
  require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."register.html.php");
  $content_for_views=ob_get_clean();
  //Recupération d'un fichier html dans une variable
  require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}
