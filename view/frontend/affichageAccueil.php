<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 29/10/2018
 * Time: 16:48
 */

$title = 'Page d\'accueil';
ob_start();

?>

		<h1>Mon super blog !</h1>
		<p>
			Derniers billets du blog :
		</p>

        <?php
		        while ($donnee = $requete->fetch()) {
        ?>
				<div class="news">
					<h3>
				<?= $donnee['title'].' <em>le '.$donnee['date_fr'].'</em>' ?>
					</h3>
					<p>
					<?= $donnee['content'] ?>
					<br/>
					<a href="index.php?action=post&id=<?= $donnee['id'] ?>">Commentaire</a>
					</p>
				</div>
				<?php

			}

$content = 	ob_get_clean();

require('template.php');

		?>
