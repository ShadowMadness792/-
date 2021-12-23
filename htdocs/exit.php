<?php

require 'configDB.php';

setcookie('admin',$user->name, time()-3600, "/");
setcookie('user',$user->name, time()-3600, "/");

header('Location: /');

?>