<?php
    //Layout ou Page de Présentation
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
?>

<div id="container_accueil">
	<div class="window">
		<?php if(is_admin()):?>
		<div class="haut">
				<h2>CRÉER ET PARAMÉTRER VOS QUIZZ</h2>
				<button class="sortie" ><a href="<?=WEB_ROOT."?controller=securite&action=deconnexion"?>">Deconnexion</a></button>
		</div>
		<div class="bas">
			<div class="gauche">
				<div id="sidebar">
					<div class="kaw">
						<img class="avatar" src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."girl.png"?>">
						<div class="tourbi">Sohna Ndiaye</div>
					</div>
					<div class="souf">
						<a href="<?=PATH_VIEWS."?controller=question&action=liste_questions"?>"">
							<p class="ic">Liste Questions 
								<img class="icone" src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."addjou.png"?>">
							</p>
						</a>
						<a href="<?=PATH_VIEWS."?controller=user&action=register"?>">
							<p class="ic">Créer Admin 
								<img class="icone" src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."addgrie.png"?>">
							</p></a>
						<a href="<?=PATH_VIEWS."?controller=user&action=accueil"?>">
						    <p class="ic">Liste Joueurs
							 	<img class="icone" src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."addjou.png"?>">
							</p>
						</a>
						<a href="<?=PATH_VIEWS."?controller=question&action=question"?>">
							<p class="ic">Créer Questions 
								<img class="icone" src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."addgrie.png"?>">
							</p>
						</a>
					</div>
				</div>
			</div>
			<div class="droite">
				<div id="affichage">
					<?php
						//Contenue des vues
						echo $content_for_views;
					?>
				</div>
			</div>
		</div>
		<?php endif ?>
	</div>
</div>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?> 	
