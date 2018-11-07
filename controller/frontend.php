<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 04/11/2018
 * Time: 15:30
 */

require('model/frontend.php');

function post() {

    $alert = '';

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $postId = $_GET['id'];
        $post = getPost($postId);

        if (!empty($post)) {

            if (isset($_POST['validate'])) {
                if (isset($_POST['nickname']) && isset($_POST['message'])) {
                    $nickname = $_POST['nickname'];
                    $comment = $_POST['message'];
                    $affectedLines = setComment($postId, $nickname, $comment);
                    if ($affectedLines == 0 || $affectedLines == NULL) {
                        throw new Exception('Impossible d\'ajouter le commentaire');
                    } else {
                        $alert = '<div class="alert alert-success">Votre commentaire a bien été envoyé</div>';
                    }
                }
            }

            $comments = getComments($postId);
            require ('view/frontend/postView.php');
        } else {
            throw new Exception('Aucun post pour cet id');
        }

    } else {
        throw new Exception('Mauvais identifiant de post envoyé dans l\'url');
    }
}


function listPosts() {
    if (isset($_GET['page'])) {
        $start = ($_GET['page']*10)-10;
        $requete = getPosts($start);
    } else {
        $requete = getPosts(0);
    }

    $nb_items = countItems('posts');
    require('view/frontend/affichageAccueil.php');
}

function countItems($items) {
    $nb_items = getCountItems($items);
    return $nb_items;
}
