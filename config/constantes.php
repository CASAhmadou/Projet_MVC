<?php
/* pour verification
echo"<pre>";
var_dump($_SERVEUR);
echo"</pre>";
*/

// Chemin sur dossier racine du projet
define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));

// Chemin sur dossier src qui contient les controllers et les models
define("PATH_SRC",ROOT."src".DIRECTORY_SEPARATOR);

// Chemin sur dossier templates du projet
define("PATH_VIEWS",ROOT."templates".DIRECTORY_SEPARATOR);

// Chemin sur data qui contient le fichier Json db.json
define("PATH_DB",ROOT."data".DIRECTORY_SEPARATOR."db.json");

//Requete GET et POST
define("WEB_ROOT","http://localhost:8001/");

// URL charger les images 
define("WEB_PUBLIC",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
// var_dump(WEB_PUBLIC);die;


//cte d'erreurs
define("KEY_ERRORS","errors");

// Cle d'accès de l'utilisateur connecte
define("KEY_USER_CONNECT","user-connect");