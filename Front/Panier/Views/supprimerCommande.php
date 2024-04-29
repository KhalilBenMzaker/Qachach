<?php
	include '../Controller/commandeC.php';
	$commandeC=new commandeC();
	$commandeC->supprimercommande($_GET["ref_commande"]);
	header('Location:affichercommande.php');
?>