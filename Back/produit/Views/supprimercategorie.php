<?php
	include '../Controller/categorieC.php';
	$categorieC=new categorieC();
	$categorieC->supprimercategorie($_GET["id_categorie"]);
	header('Location:affichercategorie.php');
?>