<?php 
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.models.php");
// Traitement des Requetes POST
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_REQUEST['action'])){
        
        if ($_REQUEST['action']=="question") {
            $questions = $_POST['questions'];
             $nbrPoints = $_POST['number'];
             $reponse = $_POST['reponse'];
             $solutions = $_POST['reponse[]'];
             $check = $_POST['rep[]'];
            //  echo'<pre>';
            //  var_dump($_POST);die;
            //  echo'</pre>';
             create_question($questions,$nbrPoints,$reponse,$solutions,$check); 
                     
         }
    } 
}

//Traitement des Requetes GET
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_REQUEST['action'])){
        if(!is_connect()) {
            header("location:".WEB_ROOT);
            exit();
        }elseif($_REQUEST['action']=="question"){
            create_question1();
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."question.html.php");

        }elseif($_REQUEST['action']=="liste_questions"){
            lister_question();
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."liste.questions.html.php");
        }
    }
}

//fonction Question
function create_question(string $questions,int $nbrPoints,string $reponse,string $solutions,string $check){
 
    $errors=[];
   
    champ_obligatoire('questions',$questions,$errors,"question obligatoire");
    champ_obligatoire('number',$nbrPoints,$errors,"nombre de points obligatoire");
    champ_obligatoire('reponse',$reponse,$errors,"reponse obligatoire");
    champ_obligatoire('reponse[]',$solutions,$errors,"reponse obligatoire");
    champ_obligatoire('rep[]',$check,$errors,"reponse obligatoire");

    if(count($errors)==0){
        valid_question('questions',$questions,$errors);
    }
    if (count($errors)==0) {
        $newQuestion = register_user_data();
        array_to_json($newQuestion,"users");
        header("location:".WEB_ROOT."?controller=securite");
    }else{
      
        $_SESSION[KEY_ERRORS]=$errors; 
        header("location:".WEB_ROOT."?controller=question&action=question");
        exit();
    }

} 
function lister_question(){
    //Appel du model
  ob_start();
  require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."liste.questions.html.php");
  $content_for_views=ob_get_clean();
  //Recupération d'un fichier html dans une variable
  require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}


function create_question1(){
    //Appel du model
  ob_start();
  require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."question.html.php");
  $content_for_views=ob_get_clean();
  //Recupération d'un fichier html dans une variable
  require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}