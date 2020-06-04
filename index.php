<?php
/* RGPD CONFORM BASICS WITH COOKIES */

require_once("view.class.php");
$VIEW = new View ((isset($_GET['rgpd'])&&is_numeric($_GET['rgpd']))?$_GET['rgpd']:-1);

?>