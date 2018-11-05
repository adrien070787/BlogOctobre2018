<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 04/11/2018
 * Time: 15:30
 */

require('model/frontend.php');

function post() {

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $postId = $_GET['id'];
        $post = getPost($postId);

        if (!empty($post)) {
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

    $requete = getPosts();
    require('view/frontend/affichageAccueil.php');
}