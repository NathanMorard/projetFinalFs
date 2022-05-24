<?php

session_start();
session_unset();
session_destroy(); 

setcookie(session_name(), '', strtotime("-1 day"));
header('Location: register_form.php');
exit;