<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 04/11/2018
 * Time: 15:30
 */

require('model/frontend.php');

function post() {

    $postId = $_GET['id'];
    $post = getPost($postId);
    $comments = getComments($postId);
    require ('view/frontend/postView.php');
}


function listPosts() {

    $requete = getPosts();
    require('view/frontend/affichageAccueil.php');
}