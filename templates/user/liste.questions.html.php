
<form action="liste_questions" method="post">
<input type="hidden" name="controller" value="user">
        <input type="hidden" name="action" value="liste_questions">    
    <div id="container-quest">
        <div class="note">
            <h3>Nbre de question/jeu</h3>
            <input type="text" name="" id="nbre">
            <button>OK</button>
        </div>
        <div class="question" id="question">
            <div class="texte-quest">
                <?php foreach ($data as $value): ?>
                    <p><?=$value['intitule']?></p>
            

                <ul>
                <?php if ($value['reponse']=="Texte"): ?>
                    <input type="text">
                <?php endif;?>
                <?php if ($value['reponse']=="Choix Multiple"): ?>
                    <?php foreach ($value['solution'] as $sol): ?>
                    <input type="checkbox">
                    <label for=""><?=$sol?></label><br>
                    <?php endforeach; ?>
                <?php endif;?>
                </ul>
                <?php if ($value['reponse']=="Unique"): ?>
                    <?php foreach ($value['solution'] as $sol): ?>
                        <input type="radio">
                        <label for=""><?=$sol?></label><br>
                    <?php endforeach; ?>
                <?php endif;?>
                <?php endforeach; ?>
            </div>
            
            
           
            <button id="next">Suivant</button>
                
            </div>
            
        </div>
    </div>
</form>    

<?php
   require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>