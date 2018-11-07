<?php

$title = 'Detail du post';
ob_start();

?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?= $alert ?>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form class="form-horizontal" method="POST" action="index.php?action=post&id=<?= $post['id'] ?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Ajouter un commentaire</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nickname">Pseudo</label>
            <div class="col-md-4">
                <input id="nickname" name="nickname" type="text" placeholder="Entez votre pseudo" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="message">Message</label>
            <div class="col-md-4">
                <textarea class="form-control" id="message" name="message">Entrez votre commentaire</textarea>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="validate"></label>
            <div class="col-md-4">
                <button id="validate" name="validate" class="btn btn-primary">Envoyer</button>
            </div>
        </div>

    </fieldset>
</form>

<hr>

<?php
while ($comment = $comments->fetch())
{
    ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
}

$content = ob_get_clean();

require('template.php');

?>

