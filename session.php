<?php
    if( !isset( $_SESSION ) ) session_start();
    if( !isset( $_SESSION['username'] ) ) exit( header('Location: index.php') );
?>