<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 07/11/2018
 * Time: 14:03
 */


?>


<div class="center">

    <?php
    $items_per_page = 10;
    $tiret = ' - ';

    for($page = 1; $page< ($nb_items/$items_per_page)+1; $page++ ) {

        if ($page == ceil($nb_items/$items_per_page)) {
            $tiret = '';
        }

        if (isset($_GET['page'])) {
            if ($_GET['page'] == $page) {
                echo '<a href="index.php?page='.$page.'"><strong>'.$page.'</strong></a>';
            } else {
                echo '<a href="index.php?page='.$page.'">'.$page.'</a>';
            }
            echo $tiret;
        } else {
            if ($page == 1) {
                echo '<a href="index.php?page='.$page.'"><strong>'.$page.'</strong></a>';
            } else {
                echo '<a href="index.php?page='.$page.'">'.$page.'</a>';
            }
            echo $tiret;
        }

    }
    ?>
</div>
