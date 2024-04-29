<?php
	include '../Controller/PanierC.php';
	$panierC=new PanierC();
	$panierC->supprimerPanier($_GET["id_panier"]);
	header('Location:afficherPanier.php');
?>