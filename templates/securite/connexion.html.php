<?php
   require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
   if (isset($_SESSION[KEY_ERRORS])){       
       $errors=$_SESSION[KEY_ERRORS];
       unset($_SESSION[KEY_ERRORS]);
    }
?>
<div id="container">
       
        <div id="container-connexion">
            <div id="entre-connexion">
                <div class="log"> Login form</div>          
                 <form id="form-connexion" action="<?=WEB_ROOT?>" method="POST">
                    <input type="hidden" name="controller" value="securite">
                    <input type="hidden" name="action" value="connexion">                  
                    <div class="corps-connexion">
                        <?php if(isset($errors['connexion'])):?>
                            <p style="color: red"> <?=$errors['connexion'];?></p>
                        <?php endif?>
                        <input type="text" id="login" class="write" name="login" value="<?= isset($_SESSION["login"])? ($_SESSION["login"]): "" ?>" > 
                        <i class="fa-solid fa-user"></i>
                        <small>Error message</small>
                     </div>
                    <div class="corps-connexion">
                        <?php if(isset($errors['login'])):?>
                            <p style="color: red"> <?=$errors['login'];?></p>
                        <?php endif?>
                        <input type="password" id="password" class="write" name="password">
                        <i class="fas fa-lock"></i>
                        <small>Error message</small>
                     </div>
                     <?php if(isset($errors['password'])):?>  
                            <p style="color: red"><?=$errors['password'];?></p>
                        <?php endif?>
                    <div id="tree">
                        <button id="connexion" class="connexion btn-connexion">connexion</button>
                        <button id="inscrit" class="inscrit btn-connexion"><a href="<?= WEB_ROOT ?>?controller=securite&action=register">S'incrire pour jouer</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
   require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>