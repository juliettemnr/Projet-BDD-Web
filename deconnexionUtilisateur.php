<?php 
include("includes/sessionStart.php");

session_unset();
session_destroy();

header("Location: index.php")

?>