<?php
	class Commande{
		private $ref_commande=null;
		private $date_commande=null;
		private $etat=null;
		private $id_panier=null;
		private $mode_payement=null;
		private $id_user=null;
		function __construct($ref_commande, $date_commande, $etat, $id_panier,$mode_payement,$id_user){
			$this->ref_commande=$ref_commande;
			$this->date_commande=$date_commande;
			$this->etat=$etat;
			$this->id_panier=$id_panier;
			$this->mode_payement=$mode_payement;
			$this->id_user=$id_user;
		}
		function getref_commande(){
			return $this->ref_commande;
		}
		function getid_user(){
			return $this->id_user;
		}
		function getdate_commande(){
			return $this->date_commande;
		}
		function getetat(){
			return $this->etat;
		}
		function getid_panier(){
			return $this->id_panier;
		}
		function getmode_payement(){
			return $this->mode_payement;
		}
		
		function setref_commande(string $ref_commande){
			$this->ref_commande=$ref_commande;
		}
		function setid_user(string $id_user){
			$this->id_user=$id_user;
		}
		function setdate_commande(string $date_commande){
			$this->date_commande=$date_commande;
		}
		function setetat(string $etat){
			$this->etat=$etat;
		}
		function setid_panier(string $id_panier){
			$this->id_panier=$id_panier;
		}
		function setmode_payement(string $mode_payement){
			$this->mode_payement=$mode_payement;
		}
		
		
	}


?>