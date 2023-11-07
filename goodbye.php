<?php
session_start();
of ( !isset( $_SESSION['user_id']))
{ require ('login_tools.php') ;}
$page_title = 'Goodbye';
include ('_header.php');
$_SESSION=array();
session_destory();
echo '<h1>Goodbye!</h1>
<p>You are now logged out.</p>
<p><a href="login.php">Login</a>
include ( '_footer.php');
