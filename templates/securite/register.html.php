<?php
    if (!is_admin()){
       require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");      
    }
    if (isset($_SESSION[KEY_ERRORS])){       
       $errors=$_SESSION[KEY_ERRORS];
       unset($_SESSION[KEY_ERRORS]);
    }
    $_SESSION[KEY_USER_CONNECT];
?>

<div id="inscrive">
	   
    <form action="<?= WEB_ROOT ?>" method="POST" class="action" enctype="multipart/form-data">
    <!-- <form action="index.php" method="post$"  ></form> -->
        <input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="register">
        <input type="hidden" name="role" value="<?= isset($_SESSION[KEY_USER_CONNECT])? "ROLE_ADMIN" : "ROLE_JOUEUR"?>">
        <input type="hidden" name="score" value="0">
          
        <div class="contener-registre">
            <div class="gauche-registre">
                <div class="content-for-registre">
                    <p>S'INSCRIRE</p>
                    <h5>Pour tester votre niveau de culture générale</h5>

                    <div class="input-control">
                        <label>Prénom</label>
                        <input type="text" placeholder="Prenom" id="prenom" class="input-registre" name="prenom">
                        <?php if(isset($errors['prenom'])):?>
                            <p style="color: red"> <?=$errors['prenom'];?></p>
                        <?php endif?>
                        <small class="error"></small>
                    </div>
                    <div class="input-control">
                        <label>Nom</label>
                        <input type="text" placeholder="nom" id="nom" class="input-registre" name="nom">
                        <?php if(isset($errors['nom'])):?>
                            <p style="color: red"> <?=$errors['nom'];?></p>
                        <?php endif?>
                        <small class="error"></small>
                    </div>
                    <div class="input-control">
                        <label >Login</label>
                        <input type="text" placeholder="Login" id="login" class="input-registre" name="login">
                        <?php if(isset($errors['login'])):?>
                            <p style="color: red"> <?=$errors['login'];?></p>
                        <?php endif?>
                        <small class="error"></small>
                    </div>
                    <div class="input-control">
                        <label>Mot de Passe</label>
                        <input type="password" placeholder="Password" id="password" class="input-registre" name="password">
                        <?php if(isset($errors['password'])):?>
                            <p style="color: red"> <?=$errors['password'];?></p>
                        <?php endif?>
                        <small class="error"></small>
                    </div>
                    <div class="input-control">
                        <label>Confirmer Mot de Passe</label>
                        <input type="password" placeholder="Confirm Paasword" id="password2" class="input-registre" name="password2">
                        <?php if(isset($errors['password2'])):?>
                            <p style="color: red"> <?=$errors['password2'];?></p>
                        <?php endif?>
                      <div class="error"></div>
                    </div>
                    
                    <div class="compte">
                        <button class="btn-register" name="compte" id="submit">Créer un Compte</button>
                    </div>
                </div>
            </div>
            <div class="droite-registre">
                
                <label class="titre" for="photo"><img id="file" src="" alt=""></label>
                <div class="touram">Avatar du Joueur</div>
                
            </div>
            <input style="display: none;" id="photo" type="file" name="picture" onchange="upload(this)">
        </form>
        </div>
    </div>

<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php"); 
?>