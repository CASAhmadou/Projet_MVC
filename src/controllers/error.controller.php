<?php
if(isset($_SESSION[KEY_ERRORS])){
    $errors=$_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
}
?>
<?php if(isset($errors['login'])):?>
    <span style="color:red;margin-left:-200px;font-size:13px"><?=$errors['login']?></span>
<?php endif ?>

<?php if(isset($errors['password'])):?>
<span style="color:red;margin-left:-200px;
font-size:13px"><?=$errors['password']?></span>
<?php endif ?>