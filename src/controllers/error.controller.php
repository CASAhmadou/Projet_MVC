<?php
if(isset($_SESSION['errors'])){
    $errors=$_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>
<?php if(isset($errors['login'])):?>
    <span style="color:red;margin-left:-200px;font-size:13px"><?=$errors['login']?></span>
<?php endif ?>
</div>
<?php if(isset($errors['password'])):?>
<span style="color:red;margin-left:-200px;
font-size:13px"><?=$errors['password']?></span>
<?php endif ?>