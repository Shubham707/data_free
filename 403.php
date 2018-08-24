<?php
header("HTTP/1.0 403 Forbidden");
echo "You ip address ".$_SERVER['REMOTE_ADDR']." has been blocked due to too many login attempts";
?>