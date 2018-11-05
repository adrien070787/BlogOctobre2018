<?php

require('controller/frontend.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'home') {
        listPosts();
    } else if ($_GET['action'] == 'post') {
        post();
    }
} else {
    listPosts();
}

?>



