<?php
///Recuperation des donnees du fichier
function json_to_array(string $key):array{
    $dataJson=file_get_contents(PATH_DB);
    $data=json_decode($dataJson,true);
    return $data[$key];
}
//Enregistrement et Mise a jour des donnees du fichier
function array_to_json(array $newuser, $key){
    $datJson=file_get_contents(PATH_DB);
    $data=json_decode($datJson,true); 
    $data['users'][]=$newuser;
    $data_file=json_encode($data,true);
    file_put_contents(PATH_DB,$data_file);   
}
