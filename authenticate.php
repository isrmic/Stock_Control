<?php

ob_start();
session_start();

require_once __DIR__ . "\class\Request.class.php";
require_once __DIR__ . "\class\Database.class.php";
require_once __DIR__ . "\class\Auth.class.php";

use Auth\Authenticate\AuthUser as Auth;

  $Auth = new Auth();
  $result = $Auth->check_login("user", "pass");
  echo $result;

?>
