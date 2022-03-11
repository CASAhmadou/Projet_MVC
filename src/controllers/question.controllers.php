<?php 
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.models.php");
// Traitement des Requetes POST
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_REQUEST['action'])){
        if ($_REQUEST['action']=="question") {
            
            $intitule = $_POST['questions'];
            $nbrPoints = $_POST['number'];
            $reponse = $_POST['reponse'];
            $solution = $_POST['solution'];
                
                $radio = $_POST['radio'];
                $check = $_POST['rep'];
            
            
            create_question($intitule,$nbrPoints,$reponse); 
             
            /*var_dump(question_data());
             echo'<pre>';
             var_dump($solution);die;
             echo'</pre>';*/
             
                     
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
function create_question(string $intitule,int $nbrPoints,string $reponse){
 
    $errors=[];
    
    champ_obligatoire('questions',$intitule,$errors,"question obligatoire");
    champ_obligatoire('number',$nbrPoints,$errors,"nombre de points obligatoire");
    champ_obligatoire('reponse',$reponse,$errors,"reponse obligatoire");
    
    

    if(count($errors)==0){
        valid_question('questions',$intitule,$errors);
    }
    if (count($errors)==0) {
        $newQuestion = question_data();
        array_to_json($newQuestion,"questions");
        header("location:".WEB_ROOT."?controller=question&action=question");
        exit();
    }else{
      
        $_SESSION[KEY_ERRORS]=$errors; 
        header("location:".WEB_ROOT."?controller=question&action=question");
        exit();
    }

} 
function lister_question(){
    //Appel du model
    $data=json_to_array("questions");
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
