
<input id="web_root" type="hidden" value="<?= WEB_ROOT ?>">
<form action="question" method="post">  
<input type="hidden" name="controller" value="question">
        <input type="hidden" name="action" value="question">  
    <div id="container-question">
        <h1>PARAMÉTRER VOTRE QUESTION</h1>
        <div class="question" id="question">
            <div class="texte-question space">
                <label for="">Questions</label>
                <input type="text" name="questions" class="test" id="question">
            </div>
            <div class="nbre-point space">
                <label for="">Nbre de Points</label>
                <input type="number" name="number" id="points">
            </div>
            <div id="reponse-question" class="space">
                <label for="">Type de réponse</label>
                <select name="reponse" id="reponse" placeholder="choisir le type de la question" onchange="delElement()">
                    <option value="1" id="option">Réponse unique</option>
                    <option value="2" id="option">Réponse à choix multiple</option>
                    <option value="3" id="option"> Réponse texte</option>
                </select>
                <img id="add-reponse" class="icone" src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."addgrie.png"?>">
                <div id="rond">
                    <button id="enregistre">Enregistre</button>
                </div>
                </div>
            </div>
            
        </div>
    </div>
</form>    

<?php
   require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>




<!-- <div class="reponse1" id="reponse1">
                <label for="">Réponse1</label>
                <input type="text" name="reponse1" id="text-reponse" class="test">
                <input type="checkbox" class="checkbox">
                <input type="radio" class="checkbox">
                <img class="icone" id="supprime" src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."addsup.png"?>">
            </div> </div>-->


            <!-- Méthode select
            <?php 
                        for ($i=1; $i<=15 ; $i++) {
                        ?>
                    <option value="1">$i</option>                
                    <?php }?>
                        </input>-->