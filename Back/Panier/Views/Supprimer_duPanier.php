<?php
	include '../Controller/panierC.php';
	$panierC=new PanierC();
	$panierC->supprimerPanier($_GET["id_panier"]);
	header('Location:afficherPanier.php');
?>