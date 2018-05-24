<?php
session_start();

session_unset();

session_destroy();

Header("Location:http://localhost/savePuppies/index.html");

?>