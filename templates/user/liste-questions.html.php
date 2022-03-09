
<form action="liste-questions" method="post">    
    <div id="container-quest">
        <div class="note">
            <h3>Nbre de question/jeu</h3>
            <input type="text" name="" id="nbre">
            <button>OK</button>
        </div>
        <div class="question" id="question">
            <div class="texte-quest">
                <p>1.Les langages Web</p>
                <ul>
                    <input type="checkbox">
                    <label for="">HTML</label><br>
                    <input type="checkbox">
                    <label for="">R</label><br>
                    <input type="checkbox">      
                    <label for="">JAVA</label>
                </ul>
            </div>
            <div class="texte-quest">
                <p>2.D'où vient le Corona</p>
                <ul>
                    <input type="checkbox">
                    <label for="">Italie</label><br>
                    <input type="checkbox">
                    <label for="">Chine</label>
                </ul>
            </div>
            <div class="texte-quest">
                <p>3.Quel terme défini le langage qui s'adapte sur android et sur ios</p>
                <input type="text">
            </div>
            <div class="texte-quest">
                <p>4.Quelle est la première école de codage gratuite au Sénégal?</p>
                <ul>
                    <input type="checkbox">
                    <label for="">Simplon</label><br>
                    <input type="checkbox">
                    <label for="">Orange Digital Center</label>
                </ul>
            </div>
            <div class="texte-quest">
                <p>5.Les précurseurs de la révolution digitale</p>
                <ul>
                    <input type="checkbox">
                    <label for="">GAFAM</label><br>
                    <input type="checkbox">
                    <label for="">CIA-FBI</label>
                </ul>
            </div>
            <button id="next">Suivant</button>
                
            </div>
            
        </div>
    </div>
</form>    

<?php
   require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>