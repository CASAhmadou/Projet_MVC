<?php
//Demarrage de la sesion
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

//inclusion des constantes
require_once dirname(dirname(__FILE__))."/config/constantes.php";

//inclusion du Validator
require_once dirname(dirname(__FILE__))."/config/validator.php";

//inclusion du orm
require_once dirname(dirname(__FILE__))."/config/orm.php";

//inclusion des roles
require_once dirname(dirname(__FILE__))."/config/role.php";

//Chargement du router
require_once dirname(dirname(__FILE__))."/config/router.php";