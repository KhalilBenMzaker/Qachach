<?php
	class Panier{
		private $id_panier=null;
		private $prixT=null;
		private $id_user=null;
		private $id_produit=null;
		function __construct($id_panier, $prixT, $id_user, $id_produit){
			$this->id_panier=$id_panier;
			$this->prixT=$prixT;
			$this->id_user=$id_user;
			$this->id_produit=$id_produit;
		}
		function getId_panier(){
			return $this->id__panier;
		}
		function getPrixT(){
			return $this->prixT;
		}
		function getId_user(){
			return $this->id_user;
		}
		function getId_produit(){
			return $this->id_produit;
		}
		
		function setId_panier(string $id_panier){
			$this->id_panier=$id_panier;
		}
		function setPrixT(string $prixT){
			$this->prixT=$prixT;
		}
		function setId_user(string $id_user){
			$this->id_user=$id_user;
		}
		function setId_produit(string $id_produit){
			$this->id_produit=$id_produit;
		}
		
		
	}


?>