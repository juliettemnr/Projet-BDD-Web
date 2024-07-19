<?php
	try
	{
    $bdd = new PDO('mysql:host=jmeunier003;dbname=projetweb;charset=utf8','jmeunier003','Lewebcfun77');
	}
	catch(Exception $e)
	{
	die('Erreur : '.$e->getMessage());
	}


