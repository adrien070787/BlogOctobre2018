<?php

require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'home') {
            listPosts();
        } else if ($_GET['action'] == 'post') {
            post();
        }
    } else {
        listPosts();
    }
} catch(Exception $e)
    {
        $messageErreur = $e->getMessage();
        require('view/errorView.php');
    }

?>



