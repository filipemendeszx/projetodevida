<?php

session_destroy();
setcookie('user_id', $user['id'], -1, "/");
setcookie('user_email', $user['email'], -1, "/");
setcookie('user_name', $user['name'], -1, "/");

header("Location: home.php");
