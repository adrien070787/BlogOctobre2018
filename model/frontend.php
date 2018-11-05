<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 29/10/2018
 * Time: 16:59
 */

function getPosts()
{

    $bdd = dbConnect();
    $requete = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%c/%Y à %Hh%imin%Ss") as date_fr, DATE_FORMAT(creation_date, "%c/%d/%Y at %Hh%imin%Ss") as date_en FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $requete;
}



function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

// Nouvelle fonction qui nous permet d'éviter de répéter du code
function dbConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}


